<?php
/**
 * SurveyParticipants model 
 *
 * PUBLIC:                 	PROTECTED:                  PRIVATE:
 * ---------------         	---------------            	---------------
 * __construct             	_relations                 
 * model (static)           _customFields	
 * getVacantParticipants   	
 * addAllParticipants
 *
 */

class SurveyParticipants extends CActiveRecord
{
	
    /** @var string */    
    protected $_table = 'surveys_entity_participants';
    /** @var string */    
    //protected $_tableSurveys = 'surveys_entities';
    /** @var string */    
    //protected $_tableParticipants = 'surveys_participants';
        

    /**
	 * Class default constructor
     */
    public function __construct()
    {
        parent::__construct();
    }
    
	/**
	 * Returns the static model of the specified AR class
	 */
   	public static function model()
   	{
		return parent::model(__CLASS__);
   	}
    
  	/**
     * Defines relations between different tables in database and current $_table
	 */
    protected function _relations()
    {
        
    }
    
    /**
     * Used to define custom fields
     * This method should be overridden
     * Usage: 'CONCAT(last_name, " ", first_name)' => 'fullname'
     */
    protected function _customFields()
    {
        
            return array();
            
    }
    
	/**
	 * Returns available participants to the given questionnaire
	 * @param int $surveyId
	 * @param bool $selectAll
	 */
	public function getVacantParticipants($surveyId, $selectAll = true)
	{
		$result = array();
        if($selectAll) $result['-1'] = A::t('surveys', 'Select All');
		$surveyQuestionnaireItems = SurveysParticipants::model()->findAll(
            CConfig::get('db.prefix').'surveys_participants.is_active AND '.
			CConfig::get('db.prefix').'surveys_participants.id NOT IN(
				SELECT participant_id
				FROM '.CConfig::get('db.prefix').$this->_table.'
				WHERE survey_id = '.(int)$surveyId.'			
			)'
		);
		
		foreach($surveyQuestionnaireItems as $key => $val){
            $result[$val['id']] = $val['full_name'].' '.$val['identity_code'];
		}
		
		return $result;
	}
    
	/**
	 * Inserts all available participants 
	 * @param int $surveyId
	 * @param int $currentParticipants
	 */
	public function addAllParticipants($surveyId = 0, $currentParticipants = 0)
	{
        // Delete all related participants
        $result = true;
        if($currentParticipants > 0){
            //$sql = "DELETE FROM ".CConfig::get('db.prefix').$this->_table." WHERE status = 0";
            //$result = $this->_db->customExec($sql);

            // Add available participants
            $sql = "INSERT INTO ".CConfig::get('db.prefix').$this->_table."
                (id, survey_id, participant_id, start_date, finish_date, status, is_active)
                (
                    SELECT NULL, :survey_id, id, NULL, NULL, 0, 1
                    FROM ".CConfig::get('db.prefix').$this->_tableParticipants." 
                    WHERE is_active = 1  
                )
				ON DUPLICATE KEY UPDATE participant_id = ".CConfig::get('db.prefix').$this->_tableParticipants.".id;
				";
            $result = $this->_db->customExec($sql, array(':survey_id'=>(int)$surveyId));    
        }
		
        return $result;
    }
    
}

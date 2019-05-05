<?php 
    $this->_pageTitle = A::t('surveys', 'Participant Login');
?>

<h1 class="title"><?= A::t('surveys', 'Participant Details'); ?></h1>
<div id="login-form">

<?php 
    echo $actionMessage;
	
	if(!empty($loginMessage)):
		echo '<p>'.$loginMessage.'</p>';
	endif;	
  
    echo CHtml::openForm('surveys/login/code/'.$code, 'post', array()) ;
    echo CHtml::hiddenField('act', 'send');
    echo CHtml::hiddenField('step', $step);
    
    // echo '<div class="row">';
    // echo '<label>'.A::t('surveys', 'Identity Code').':</label>';
    // echo '<input id="identity_code" type="text" name="identity_code" value="'.CHtml::encode($identityCode).'" maxlength="20" autocomplete="off" />';
    // echo '</div>';
    if($showFirstName && $fieldFirstName !== 'no'):
        echo '<div class="row">';
        echo '<label>'.A::t('surveys', 'First Name').':</label>';
        echo '<input id="first_name" type="text" name="first_name" value="'.CHtml::encode($firstName).'" maxlength="32" autocomplete="off" value="test" />';
        echo '</div>';
    endif;

    if($showLastName && $fieldLastName !== 'no'):
        echo '<div class="row">';
        echo '<label>'.A::t('surveys', 'Last Name').':</label>';
        echo '<input id="last_name" type="text" name="last_name" value="'.CHtml::encode($lastName).'" maxlength="32" autocomplete="off" value="user1" />';
        echo '</div>';
    endif;

    if($showPhone):
        echo '<div class="row">';
        echo '<label>'.A::t('surveys', 'Mobile').':</label>';
        echo '<input id="phone" class="number_input" type="text" name="phone" value="'.CHtml::encode($phone).'" maxlength="100" autocomplete="off" value="123456" />';
        echo '</div>';
    endif;

    if($showEmail && $fieldEmail !== 'no'):
        echo '<div class="row">';
        echo '<label>'.A::t('surveys', 'Email').':</label>';
        echo '<input id="email" type="text" name="email" value="'.CHtml::encode($email).'" maxlength="100" autocomplete="off" value="a@b.com" />';
        echo '</div>';
    endif;

    

    if($fieldPassword == 'allow'):
        echo '<div class="row">';
        echo '<label>'.A::t('surveys', 'Password').':</label>';
        echo '<input id="password" type="password" name="password" value="'.CHtml::encode($password).'" maxlength="20" autocomplete="off" />';
        echo '</div>';        
    endif;
    
    if($step == 2):
        
    
        if($showGender && $fieldGender !== 'no'):
            echo '<div class="row">';
            echo '<label>'.A::t('surveys', 'Gender').':</label>';
            echo '<input type="radio" id="gender_f" name="gender"'.($gender == 'f' ? ' checked="checked"' : '').' value="f" /> <label for="gender_f" class="gender">'.A::t('surveys', 'Female').'</label>';
            echo '<input type="radio" id="gender_m" name="gender"'.($gender == 'm' ? ' checked="checked"' : '').'  value="m" /> <label for="gender_m" class="gender">'.A::t('surveys', 'Male').'</label>';
            echo '</div>';
        endif;
    endif;

	if($showTermsAndConditions):
		echo '<div class="row">';
		echo '<label></label>';
		echo '<input type="checkbox" id="agree" name="agree"'.($agree == 'on' ? ' checked="checked"' : '').' /> <label for="agree" class="remember" >'.A::t('surveys', 'I agree with Terms and Conditions').'</label><br/>';
		echo '</div>';
	endif;
    
    echo '<div class="row row-button">';
    echo '<label></label>';
    echo '<input type="submit" class="btn" src="templates/default/images/login.png" value="'.A::t('surveys', 'Next').'" />';
    echo '</div>';        
   
    echo CHtml::closeForm();
    
?>     
</div>
<?php
    if(!empty($errorField)):
        A::app()->getClientScript()->registerScript(
            'participant-login',
            '$(document).ready(function(){
                $("#'.$errorField.'").focus();
                $(".number_input").keydown(function(e){if($.inArray(e.keyCode,[46,8,9,27,13,110,190])!==-1||(e.keyCode===65&&(e.ctrlKey===true||e.metaKey===true))||(e.keyCode>=35&&e.keyCode<=40)){return;}
    if((e.shiftKey||(e.keyCode<48||e.keyCode>57))&&(e.keyCode<96||e.keyCode>105)){e.preventDefault();}});
            });',
            2
        );
    endif;
?>
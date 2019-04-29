<?php

class CategoryController extends Controller
{
    public $layout = 'frontend';
    public $description= "The Largest deal site in broadband marketplace.";
    public $title = "bdbroadbanddeals.com";

    public function actionIndex()
    {
        $this->render('index');
    }

    /*
	 * get Recently Viewed Ads
	 */
    public function actionGetRecentlyViewedAds($country_code = '')
    {
        $requested_country = Generic::checkValidCountryRequest($country_code);

        if($country_code && !$requested_country){
            return ;
        }
        $profile_page_slider_ads = Generic::getHomePageRightSideAds('classic_top_banner',0,0,$country_code);
        if(is_array($profile_page_slider_ads) && count($profile_page_slider_ads) > 1){
            shuffle($profile_page_slider_ads);
        }

        $this->render('recently-viewed-ads',array(
            'profile_page_slider_ads'=>$profile_page_slider_ads,

        ));
    }

    public static function actionInsertCategoryScript()
    {

        $builder = Yii::app()->db->schema->commandBuilder;
        $command = $builder->createMultipleInsertCommand('tbl_category', array(

            /* -----------------------------------------------------Main Category-----------------------------------*/
            array('category_name' => 'Car & Vehicles', 'category_slug' => 'car_n_vehicles', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Computer & Internet', 'category_slug' => 'computer_n_internet', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Electronics Appliance', 'category_slug' => 'electronics_appliance', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Security & Alarming System', 'category_slug' => 'security_n_alarming_system', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Fashion & Garments', 'category_slug' => 'fashion_n_garments', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Furniture & Decoration', 'category_slug' => 'furniture_n_decoration', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Beauty & Spa', 'category_slug' => 'beauty_n_spa', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Hotel & Restaurant ', 'category_slug' => 'hotel_n_restaurant', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Mobile Phone & Gadgets', 'category_slug' => 'mobile_n_gadget', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Real State / Property / Land', 'category_slug' => 'real_property_land', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Tour & Travels', 'category_slug' => 'tour_n_travels', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Jobs & Career', 'category_slug' => 'jobs_n_career', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Food & Bevarage', 'category_slug' => 'food_n_bevarage', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Business Services', 'category_slug' => 'business_services', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Baby Products', 'category_slug' => 'baby_products', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Agriculture Products', 'category_slug' => 'agriculture_products', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Aquarium & Pets', 'category_slug' => 'aquarium_n_pets', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Books & Magazine', 'category_slug' => 'books_n_magazine', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Events & Exhibition', 'category_slug' => 'events_n_exhibition', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Fitness & Sports', 'category_slug' => 'fitness_n_sports', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Weeding / Matrimoni ', 'category_slug' => 'weeding_matrimoni', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Music & Multimedia', 'category_slug' => 'music_n_multimedia', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Loan & Insurance', 'category_slug' => 'loan_n_insurance', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Legal / Law', 'category_slug' => 'legal_n_law', 'sub_category_slug' => '', 'parent_id' => '0'),
            array('category_name' => 'Education & Immigration', 'category_slug' => 'education_n_immigration', 'sub_category_slug' => '', 'parent_id' => '0'),
            /* ------------------------------------------------------End Of Main Category-----------------------------------*/


            /* ------------------------------------------Sub Category For Car & Vehicles -----------------------------------*/
            array('category_name' => 'Auto Rickshaw & CNG / Taxis', 'category_slug' => '', 'sub_category_slug' => 'auto_rickshaw_n_cng', 'parent_id' => '1'),
            array('category_name' => 'Car & Mini Bus', 'category_slug' => '', 'sub_category_slug' => 'car_n_mini_bus', 'parent_id' => '1'),
            array('category_name' => 'Commercial Vehicles', 'category_slug' => '', 'sub_category_slug' => 'commercial_vehicles', 'parent_id' => '1'),
            array('category_name' => 'Motorcycle & Bike', 'category_slug' => '', 'sub_category_slug' => 'motorcycles_n_bike', 'parent_id' => '1'),
            array('category_name' => 'Rental  Vehicles ', 'category_slug' => '', 'sub_category_slug' => 'rental_vehicles', 'parent_id' => '1'),
            array('category_name' => 'Ship & Boat', 'category_slug' => '', 'sub_category_slug' => 'ship_n_boat', 'parent_id' => '1'),
            array('category_name' => 'Car Decoration', 'category_slug' => '', 'sub_category_slug' => 'car_decoration', 'parent_id' => '1'),
            array('category_name' => 'Auto-mobile Service', 'category_slug' => '', 'sub_category_slug' => 'automobile_service', 'parent_id' => '1'),
            array('category_name' => 'Fuel / CNG Station', 'category_slug' => '', 'sub_category_slug' => 'fuel_cng_station', 'parent_id' => '1'),
            array('category_name' => 'Parts & Accessories', 'category_slug' => '', 'sub_category_slug' => 'parts_n_accessories', 'parent_id' => '1'),
            array('category_name' => 'Accessories & Services', 'category_slug' => '', 'sub_category_slug' => 'accessories_n_services', 'parent_id' => '1'),
            /* ------------------------------------------End of Sub Category For Car & Vehicles -----------------------------------*/

            /* ------------------------------------------Sub Category For Computer & Internet -----------------------------------*/
            array('category_name' => 'Laptop & Notebook', 'category_slug' => '', 'sub_category_slug' => 'laptop_n_notebook', 'parent_id' => '2'),
            array('category_name' => 'Desktop / Tablet PC', 'category_slug' => '', 'sub_category_slug' => 'desktop_tablet_pc', 'parent_id' => '2'),
            array('category_name' => 'Computer Accessories', 'category_slug' => '', 'sub_category_slug' => 'computer_accessories', 'parent_id' => '2'),
            array('category_name' => 'Gaming Accessories', 'category_slug' => '', 'sub_category_slug' => 'gaming_accessories', 'parent_id' => '2'),
            array('category_name' => 'Networking  Devices', 'category_slug' => '', 'sub_category_slug' => 'networking_devices', 'parent_id' => '2'),
            array('category_name' => 'Internet Service (ISP)', 'category_slug' => '', 'sub_category_slug' => 'internet_service', 'parent_id' => '2'),
            array('category_name' => 'Printer / PABX', 'category_slug' => '', 'sub_category_slug' => 'printer_n_pabx', 'parent_id' => '2'),
            array('category_name' => 'Scanner & Projector', 'category_slug' => '', 'sub_category_slug' => 'scanner_n_projector', 'parent_id' => '2'),
            array('category_name' => 'Software & Antivirus', 'category_slug' => '', 'sub_category_slug' => 'software_n_antivirus', 'parent_id' => '2'),
            array('category_name' => 'Web Design & Domain Hosting', 'category_slug' => '', 'sub_category_slug' => 'web_design_n_domain_hosting', 'parent_id' => '2'),
            array('category_name' => 'Repair / Servicing Center', 'category_slug' => '', 'sub_category_slug' => 'repair_n_servicing ', 'parent_id' => '2'),
            /* ------------------------------------------End of Sub Category For Computer & Internet -----------------------------------*/


            /* ------------------------------------------Sub Category For Electronics Appliance -----------------------------------*/
            array('category_name' => 'TV & DVD Player', 'category_slug' => '', 'sub_category_slug' => 'tv_n_dvd_player', 'parent_id' => '3'),
            array('category_name' => 'Air Conditioners', 'category_slug' => '', 'sub_category_slug' => 'air_conditioners', 'parent_id' => '3'),
            array('category_name' => 'Air Coolers', 'category_slug' => '', 'sub_category_slug' => 'air_coolers', 'parent_id' => '3'),
            array('category_name' => 'Deep Freezers', 'category_slug' => '', 'sub_category_slug' => 'deep_freezers', 'parent_id' => '3'),
            array('category_name' => 'Fan', 'category_slug' => '', 'sub_category_slug' => 'fan', 'parent_id' => '3'),
            array('category_name' => 'Gas Burners', 'category_slug' => '', 'sub_category_slug' => 'gas_burners', 'parent_id' => '3'),
            array('category_name' => 'Irons', 'category_slug' => '', 'sub_category_slug' => 'irons', 'parent_id' => '3'),
            array('category_name' => 'Microwave Ovens', 'category_slug' => '', 'sub_category_slug' => 'microwave_ovens', 'parent_id' => '3'),
            array('category_name' => 'Refrigerators', 'category_slug' => '', 'sub_category_slug' => 'refrigerators', 'parent_id' => '3'),
            array('category_name' => 'Sewing Machines', 'category_slug' => '', 'sub_category_slug' => 'sewing_machines', 'parent_id' => '3'),
            array('category_name' => 'Washing Machines', 'category_slug' => '', 'sub_category_slug' => 'washing_machines', 'parent_id' => '3'),
            array('category_name' => 'Water Purifiers', 'category_slug' => '', 'sub_category_slug' => 'water_purifiers', 'parent_id' => '3'),
            //array('category_name' => 'Electric Oven', 'category_slug' => '', 'sub_category_slug' => 'electric oven','parent_id' => '3'),
            array('category_name' => 'Rice Cooker', 'category_slug' => '', 'sub_category_slug' => 'rice_cooker', 'parent_id' => '3'),
            array('category_name' => 'Pressure  Cooker', 'category_slug' => '', 'sub_category_slug' => 'pressure_cooker', 'parent_id' => '3'),
            array('category_name' => 'IPS, UPS, Batteries & Generators', 'category_slug' => '', 'sub_category_slug' => 'ips_ups_batteries_generator', 'parent_id' => '3'),
            //array('category_name' => 'Voltage Stabilizers', 'category_slug' => '', 'sub_category_slug' => 'voltage_stabilizers','parent_id' => '3'),
            array('category_name' => 'Curry Cooker', 'category_slug' => '', 'sub_category_slug' => 'curry_cooker', 'parent_id' => '3'),
            //array('category_name' => 'Induction Cooker', 'category_slug' => '', 'sub_category_slug' => 'curry_cooker','parent_id' => '3'),
            array('category_name' => 'Toaster & Sandwich Machine', 'category_slug' => '', 'sub_category_slug' => 'toaster_n_sandwitch_machine', 'parent_id' => '3'),
            array('category_name' => 'Coffee Maker', 'category_slug' => '', 'sub_category_slug' => 'coffee_maker', 'parent_id' => '3'),
            array('category_name' => 'Ruti & Snack Maker', 'category_slug' => '', 'sub_category_slug' => 'ruti_n_snack_maker', 'parent_id' => '3'),
            array('category_name' => 'Repair / Servicing', 'category_slug' => '', 'sub_category_slug' => 'repair_servicing', 'parent_id' => '3'),
            //array('category_name' => 'Others Accessories', 'category_slug' => '', 'sub_category_slug' => 'other_accessories','parent_id' => '3'),
            /* ------------------------------------------End of Sub Category For Electronics Appliance  -----------------------------------*/

            /* ------------------------------------------Sub Category For Security and Alarming System -----------------------------------*/
            array('category_name' => 'CCTV & IP CAMERA', 'category_slug' => '', 'sub_category_slug' => 'cctv_n_ip_camera', 'parent_id' => '4'),
            array('category_name' => 'DVR & NVR', 'category_slug' => '', 'sub_category_slug' => 'dvr_n_nvr', 'parent_id' => '4'),
            array('category_name' => 'Door Phone', 'category_slug' => '', 'sub_category_slug' => 'door_phone', 'parent_id' => '4'),
            array('category_name' => 'Metal Detector', 'category_slug' => '', 'sub_category_slug' => 'metal_detector', 'parent_id' => '4'),
            array('category_name' => 'Attendance Machine', 'category_slug' => '', 'sub_category_slug' => 'attendance_machine', 'parent_id' => '4'),
            array('category_name' => 'Fire Equipment', 'category_slug' => '', 'sub_category_slug' => 'fire_equipment', 'parent_id' => '4'),
            array('category_name' => 'Alarming System', 'category_slug' => '', 'sub_category_slug' => 'alarming_system', 'parent_id' => '4'),
            array('category_name' => 'Access Controller', 'category_slug' => '', 'sub_category_slug' => 'access_controller', 'parent_id' => '4'),
            /* ------------------------------------------End of Sub Category For Electronics Appliance  -----------------------------------*/


            /* ------------------------------------------Sub Category For Fashion & Garments -----------------------------------*/
            array('category_name' => 'Men Cloths', 'category_slug' => '', 'sub_category_slug' => 'men_clothes', 'parent_id' => '5'),
            array('category_name' => 'Women Clothes', 'category_slug' => '', 'sub_category_slug' => 'women_clothes', 'parent_id' => '5'),
            array('category_name' => 'Footwear & Shoes', 'category_slug' => '', 'sub_category_slug' => 'footwear_n_shoes', 'parent_id' => '5'),
            array('category_name' => 'Jewelry (Silver & Gold)', 'category_slug' => '', 'sub_category_slug' => 'jewelry', 'parent_id' => '5'),
            array('category_name' => 'Sunglasses', 'category_slug' => '', 'sub_category_slug' => 'sunglasses', 'parent_id' => '5'),
            array('category_name' => 'Watches', 'category_slug' => '', 'sub_category_slug' => 'watches', 'parent_id' => '5'),
            //array('category_name' => 'Fashion House', 'category_slug' => '', 'sub_category_slug' => 'fashion_house','parent_id' => '5'),
            array('category_name' => 'Printing & Stickers/ Tattoos ', 'category_slug' => '', 'sub_category_slug' => 'printing_n_stickers', 'parent_id' => '5'),
            /* ------------------------------------------End of Sub Category For Fashion & Garments  -----------------------------------*/

            /* ------------------------------------------Sub Category For Furniture & Decoration -----------------------------------*/
            array('category_name' => 'Living room Furniture ', 'category_slug' => '', 'sub_category_slug' => 'living_room_furniture', 'parent_id' => '6'),
            array('category_name' => 'Dining Room Furniture', 'category_slug' => '', 'sub_category_slug' => 'dining_room_furniture', 'parent_id' => '6'),
            array('category_name' => 'Reading room Furniture', 'category_slug' => '', 'sub_category_slug' => 'reading_room_furniture', 'parent_id' => '6'),
            array('category_name' => 'Office Furniture', 'category_slug' => '', 'sub_category_slug' => 'office_furniture', 'parent_id' => '6'),
            //array('category_name' => 'Miscellaneous', 'category_slug' => '', 'sub_category_slug' => 'miscellaneous','parent_id' => '6'),
            array('category_name' => 'Interior Decoration', 'category_slug' => '', 'sub_category_slug' => 'interior_decoration ', 'parent_id' => '6'),
            /* ------------------------------------------End of Sub Category For Furniture & Decoration  -----------------------------------*/


            /* ------------------------------------------Sub Category For Beauty and Spa-----------------------------------*/
            array('category_name' => 'Beauty Parlors', 'category_slug' => '', 'sub_category_slug' => 'beauty_parlors', 'parent_id' => '7'),
            array('category_name' => 'Beauty Products', 'category_slug' => '', 'sub_category_slug' => 'beauty_products', 'parent_id' => '7'),
            array('category_name' => 'Cosmetics & Toiletries', 'category_slug' => '', 'sub_category_slug' => 'cosmetics_n_toiletries', 'parent_id' => '7'),
            array('category_name' => 'Beauticians', 'category_slug' => '', 'sub_category_slug' => 'beauticians', 'parent_id' => '7'),
            array('category_name' => 'Haircut shop', 'category_slug' => '', 'sub_category_slug' => 'haircut_shop', 'parent_id' => '7'),
            array('category_name' => 'Herbal Products', 'category_slug' => '', 'sub_category_slug' => 'herbal_products', 'parent_id' => '7'),
            array('category_name' => 'Spa Center', 'category_slug' => '', 'sub_category_slug' => 'spa_center', 'parent_id' => '7'),
            //array('category_name' => 'Others', 'category_slug' => '', 'sub_category_slug' => 'others','parent_id' => '7'),

            /* ------------------------------------------End of Sub Category For Beauty and Spa -----------------------------------*/

            /* ------------------------------------------Sub Category For Hotel and Restaurants-----------------------------------*/
            array('category_name' => 'Mini Restaurant', 'category_slug' => '', 'sub_category_slug' => 'mini_restaurant', 'parent_id' => '8'),
            array('category_name' => 'Chinese Restaurant', 'category_slug' => '', 'sub_category_slug' => 'chinese_restaurant', 'parent_id' => '8'),
            array('category_name' => 'Residential Hotel', 'category_slug' => '', 'sub_category_slug' => 'residential_hotel', 'parent_id' => '8'),
            array('category_name' => 'International Hotel', 'category_slug' => '', 'sub_category_slug' => 'international_hotel', 'parent_id' => '8'),
            array('category_name' => 'Guest/Rest House', 'category_slug' => '', 'sub_category_slug' => 'guest_n_rest_house', 'parent_id' => '8'),
            //array('category_name' => 'Hotel Equipment', 'category_slug' => '', 'sub_category_slug' => 'hotel_equipment','parent_id' => '8'),

            /* ------------------------------------------End of Sub Category For Hotel and Restaurants -----------------------------------*/

            /* ------------------------------------------Sub Category For Mobile Phone and Gadgets-----------------------------------*/
            array('category_name' => 'Android Mobiles', 'category_slug' => '', 'sub_category_slug' => 'android_mobiles', 'parent_id' => '9'),
            array('category_name' => 'Keypad Mobiles', 'category_slug' => '', 'sub_category_slug' => 'keypad_mobiles', 'parent_id' => '9'),
            array('category_name' => 'Windows Mobile', 'category_slug' => '', 'sub_category_slug' => 'windows_mobiles', 'parent_id' => '9'),
            //array('category_name' => 'Mobile Shop', 'category_slug' => '', 'sub_category_slug' => 'windows_mobiles','parent_id' => '9'),
            array('category_name' => 'I-Phone', 'category_slug' => '', 'sub_category_slug' => 'i_phone', 'parent_id' => '9'),
            array('category_name' => 'Tab / Notepad', 'category_slug' => '', 'sub_category_slug' => 'tab_notepad', 'parent_id' => '9'),
            array('category_name' => 'Mobile Accessories', 'category_slug' => '', 'sub_category_slug' => 'mobile_accessories', 'parent_id' => '9'),
            /* ------------------------------------------End of Sub Category For Mobile Phone and Gadgets-----------------------------------*/

            /* ------------------------------------------Sub Category For Real State / Property / Land-----------------------------------*/
            array('category_name' => 'Architecture & Design', 'category_slug' => '', 'sub_category_slug' => 'architecture_n_design', 'parent_id' => '10'),
            array('category_name' => 'Civil Contractors', 'category_slug' => '', 'sub_category_slug' => 'civil_contractors', 'parent_id' => '10'),
            array('category_name' => 'Plot/Land for Sale', 'category_slug' => '', 'sub_category_slug' => 'plot_land_for_sale', 'parent_id' => '10'),
            array('category_name' => 'Apartment and Flat for Sale', 'category_slug' => '', 'sub_category_slug' => 'apartment_n_flat', 'parent_id' => '10'),
            array('category_name' => 'Real-State Agents', 'category_slug' => '', 'sub_category_slug' => 'real_state_agents', 'parent_id' => '10'),
            array('category_name' => 'Real-State  Firm/ Developer', 'category_slug' => '', 'sub_category_slug' => 'real_state_firm_developer', 'parent_id' => '10'),
            array('category_name' => 'Material Supplier', 'category_slug' => '', 'sub_category_slug' => 'material_supplier', 'parent_id' => '10'),
            /* ------------------------------------------End of Sub Category For Real State / Property / Land-----------------------------------*/

            /* ------------------------------------------Sub Category For Tour and Travels-----------------------------------*/
            array('category_name' => 'Bus / Train / Airlines', 'category_slug' => '', 'sub_category_slug' => 'bus_train_airlines', 'parent_id' => '11'),
            array('category_name' => 'Travel Agents', 'category_slug' => '', 'sub_category_slug' => 'travel_agents', 'parent_id' => '11'),
            array('category_name' => 'Resort', 'category_slug' => '', 'sub_category_slug' => 'resort', 'parent_id' => '11'),
            array('category_name' => 'Heritage Park', 'category_slug' => '', 'sub_category_slug' => 'heritage_park', 'parent_id' => '11'),
            array('category_name' => 'Visa Agencies', 'category_slug' => '', 'sub_category_slug' => 'visa_agencies', 'parent_id' => '11'),
            array('category_name' => 'Tourist Coach / Car / Boat', 'category_slug' => '', 'sub_category_slug' => 'tourist_coach', 'parent_id' => '11'),
            array('category_name' => 'Tourism Business', 'category_slug' => '', 'sub_category_slug' => 'tourism_business', 'parent_id' => '11'),
            array('category_name' => 'Tourist Guide', 'category_slug' => '', 'sub_category_slug' => 'tourist_guide', 'parent_id' => '11'),
            /* ------------------------------------------End of Sub Category For Tour and Travels-----------------------------------*/

            /* ------------------------------------------Sub Category For Jobs and Career-----------------------------------*/
            array('category_name' => 'Jobs Available', 'category_slug' => '', 'sub_category_slug' => 'jobs_available', 'parent_id' => '12'),
            array('category_name' => 'Job Wanted', 'category_slug' => '', 'sub_category_slug' => 'job_wanted', 'parent_id' => '12'),
            //array('category_name' => 'HR Consultancies', 'category_slug' => '', 'sub_category_slug' => 'hr_consultancies','parent_id' => '12'),
            array('category_name' => 'HR Consultancies', 'category_slug' => '', 'sub_category_slug' => 'hr_consultancies', 'parent_id' => '12'),
            array('category_name' => 'Others', 'category_slug' => '', 'sub_category_slug' => 'others_job', 'parent_id' => '12'),
            /* ------------------------------------------End of Sub Category For Jobs and Career-----------------------------------*/

            /* ------------------------------------------Sub Category For Food and Beverage-----------------------------------*/
            array('category_name' => 'Sweetmeat Shop', 'category_slug' => '', 'sub_category_slug' => 'sweetmeat_shop', 'parent_id' => '13'),
            array('category_name' => 'Dessert Food (Cake)', 'category_slug' => '', 'sub_category_slug' => 'desert_food', 'parent_id' => '13'),
            array('category_name' => 'Coffee & Tea', 'category_slug' => '', 'sub_category_slug' => 'coffee_n_tea', 'parent_id' => '13'),
            array('category_name' => 'Fast Food', 'category_slug' => '', 'sub_category_slug' => 'fast_food', 'parent_id' => '13'),
            array('category_name' => 'Confectionary', 'category_slug' => '', 'sub_category_slug' => 'confectioanry', 'parent_id' => '13'),
            array('category_name' => 'Food Products', 'category_slug' => '', 'sub_category_slug' => 'food_products', 'parent_id' => '13'),
            array('category_name' => 'Water Supplier', 'category_slug' => '', 'sub_category_slug' => 'water_supplier', 'parent_id' => '13'),
            array('category_name' => 'Soft Drinks', 'category_slug' => '', 'sub_category_slug' => 'soft_drinks', 'parent_id' => '13'),
            array('category_name' => 'Festival Food', 'category_slug' => '', 'sub_category_slug' => 'festival_food', 'parent_id' => '13'),
            /* ------------------------------------------End of Sub Category For For Food and Beverage -----------------------------------*/

            /* ------------------------------------------Sub Category For Business Services -----------------------------------*/
            array('category_name' => 'Advertising Firm', 'category_slug' => '', 'sub_category_slug' => 'advertising_firm', 'parent_id' => '14'),
            array('category_name' => 'Hospital & Diagnostic Center', 'category_slug' => '', 'sub_category_slug' => 'hospital_n_diagnostic_center', 'parent_id' => '14'),
            array('category_name' => 'Clearing & Forwarding Agents (C & F)', 'category_slug' => '', 'sub_category_slug' => 'cnf_agent', 'parent_id' => '14'),
            array('category_name' => 'Commission Agents', 'category_slug' => '', 'sub_category_slug' => 'commission_agents', 'parent_id' => '14'),
            array('category_name' => 'Custom House Brokers', 'category_slug' => '', 'sub_category_slug' => 'custom_house_brookers', 'parent_id' => '14'),
            array('category_name' => 'Exporter, Importer & Indenter (Multi Products)', 'category_slug' => '', 'sub_category_slug' => 'exporter_importer_indenter', 'parent_id' => '14'),
            array('category_name' => 'Trade Directory', 'category_slug' => '', 'sub_category_slug' => 'trade_directory', 'parent_id' => '14'),
            array('category_name' => 'Tender', 'category_slug' => '', 'sub_category_slug' => 'tender', 'parent_id' => '14'),
            array('category_name' => 'Whole Seller', 'category_slug' => '', 'sub_category_slug' => 'whole_seller', 'parent_id' => '14'),
            array('category_name' => 'Courier Services', 'category_slug' => '', 'sub_category_slug' => 'courier_services', 'parent_id' => '14'),
            array('category_name' => 'Corporate Solution', 'category_slug' => '', 'sub_category_slug' => 'corporate_solution', 'parent_id' => '14'),
            array('category_name' => 'Security Services', 'category_slug' => '', 'sub_category_slug' => 'security_services', 'parent_id' => '14'),
            array('category_name' => 'Cleaning Services', 'category_slug' => '', 'sub_category_slug' => 'cleaning_services', 'parent_id' => '14'),
            array('category_name' => 'Others Services', 'category_slug' => '', 'sub_category_slug' => 'others_services', 'parent_id' => '14'),
            /* ------------------------------------------End of Sub Category For Business Services -----------------------------------*/

            /* ------------------------------------------Sub Category For Baby Products -----------------------------------*/
            array('category_name' => 'Newborn cloth', 'category_slug' => '', 'sub_category_slug' => 'newborn_cloth', 'parent_id' => '15'),
            array('category_name' => 'Baby Girls Product', 'category_slug' => '', 'sub_category_slug' => 'baby_girls_product', 'parent_id' => '15'),
            array('category_name' => 'Baby Boys Product', 'category_slug' => '', 'sub_category_slug' => 'baby_boys_product', 'parent_id' => '15'),
            array('category_name' => 'Baby Accessories', 'category_slug' => '', 'sub_category_slug' => 'baby_accessories', 'parent_id' => '15'),
            /* ------------------------------------------End of Sub Category For Baby Products -----------------------------------*/

            /* ------------------------------------------Sub Category For Agriculture Products -----------------------------------*/
            array('category_name' => 'Agro Feeds', 'category_slug' => '', 'sub_category_slug' => 'agro_feeds', 'parent_id' => '16'),
            array('category_name' => 'Crops and Seeds', 'category_slug' => '', 'sub_category_slug' => 'crops_n_seeds', 'parent_id' => '16'),
            array('category_name' => 'Fruits & Vegetables', 'category_slug' => '', 'sub_category_slug' => 'fruits_n_vegetables', 'parent_id' => '16'),
            array('category_name' => 'Flower & Garden', 'category_slug' => '', 'sub_category_slug' => 'flower_n_garden', 'parent_id' => '16'),
            array('category_name' => 'Hatchery', 'category_slug' => '', 'sub_category_slug' => 'hatchery', 'parent_id' => '16'),
            array('category_name' => 'Poultry Firm', 'category_slug' => '', 'sub_category_slug' => 'poultry_firm', 'parent_id' => '16'),
            array('category_name' => 'Accessories', 'category_slug' => '', 'sub_category_slug' => 'accessories', 'parent_id' => '16'),
            /* ------------------------------------------End of Sub Category For Agriculture Products -----------------------------------*/

            /* ------------------------------------------Sub Category For Aquarium & Pets -----------------------------------*/
            array('category_name' => 'Animal & Pets', 'category_slug' => '', 'sub_category_slug' => 'animal_n_pets', 'parent_id' => '17'),
            array('category_name' => 'Popular Birds', 'category_slug' => '', 'sub_category_slug' => 'popular_birds', 'parent_id' => '17'),
            array('category_name' => 'Aquarium Fish', 'category_slug' => '', 'sub_category_slug' => 'aquarium_fish', 'parent_id' => '17'),
            array('category_name' => 'Veterinary Doctor', 'category_slug' => '', 'sub_category_slug' => 'veterinary_doctor', 'parent_id' => '17'),
            array('category_name' => 'Aquarium & Pets Accessories', 'category_slug' => '', 'sub_category_slug' => 'aquarium_n_pets_accessories', 'parent_id' => '17'),
            /* ------------------------------------------End of Sub Category For Aquarium & Pets -----------------------------------*/

            /* ------------------------------------------Sub Category For Books & Magazine -----------------------------------*/
            array('category_name' => 'Baby Books', 'category_slug' => '', 'sub_category_slug' => 'baby_books', 'parent_id' => '18'),
            array('category_name' => 'Novel / Poem / Story ', 'category_slug' => '', 'sub_category_slug' => 'novel_poem_story ', 'parent_id' => '18'),
            array('category_name' => 'Food & Recipes', 'category_slug' => '', 'sub_category_slug' => 'food_n_recipes', 'parent_id' => '18'),
            array('category_name' => 'Health & Beauty', 'category_slug' => '', 'sub_category_slug' => 'health_n_beauty', 'parent_id' => '18'),
            array('category_name' => 'ICT Books', 'category_slug' => '', 'sub_category_slug' => 'ict_books', 'parent_id' => '18'),
            array('category_name' => 'Books Publisher', 'category_slug' => '', 'sub_category_slug' => 'books_publisher', 'parent_id' => '18'),
            /* ------------------------------------------End of Sub Category For Books & Magazine -----------------------------------*/


            /* ------------------------------------------Sub Category For Events & Exhibition -----------------------------------*/
            array('category_name' => 'Event Management', 'category_slug' => '', 'sub_category_slug' => 'event_management', 'parent_id' => '19'),
            array('category_name' => 'Event Equipment', 'category_slug' => '', 'sub_category_slug' => 'event_equipment', 'parent_id' => '19'),
            array('category_name' => 'Exhibition centre', 'category_slug' => '', 'sub_category_slug' => 'exhibition_centre', 'parent_id' => '19'),
            array('category_name' => 'Popular Exhibition', 'category_slug' => '', 'sub_category_slug' => 'popular_exhibition', 'parent_id' => '19'),
            array('category_name' => 'Design and Fabrication', 'category_slug' => '', 'sub_category_slug' => 'design_n_fabrication', 'parent_id' => '19'),
            /* ------------------------------------------End of Sub Category For Events & Exhibition -----------------------------------*/


            /* ------------------------------------------Sub Category For Fitness and Sports-----------------------------------*/
            array('category_name' => 'Gym & Fitness Center', 'category_slug' => '', 'sub_category_slug' => 'gym_fitness_center', 'parent_id' => '20'),
            array('category_name' => 'Yoga center', 'category_slug' => '', 'sub_category_slug' => 'yoga_center', 'parent_id' => '20'),
            array('category_name' => 'Gym Equipment', 'category_slug' => '', 'sub_category_slug' => 'gym_equipment', 'parent_id' => '20'),
            array('category_name' => 'Sports Accessories', 'category_slug' => '', 'sub_category_slug' => 'sports_accessories', 'parent_id' => '20'),
            array('category_name' => 'Trainer', 'category_slug' => '', 'sub_category_slug' => 'trainer', 'parent_id' => '20'),
            /* ------------------------------------------End of Sub Category For For Fitness and Sports -----------------------------------*/

            /* ------------------------------------------Sub Category For Weeding / Matrimoni-----------------------------------*/
            array('category_name' => 'Photographer / Model', 'category_slug' => '', 'sub_category_slug' => 'photographer_model', 'parent_id' => '21'),
            array('category_name' => 'Community Center', 'category_slug' => '', 'sub_category_slug' => 'community_center', 'parent_id' => '21'),
            array('category_name' => 'Matrimony', 'category_slug' => '', 'sub_category_slug' => 'matrimony', 'parent_id' => '21'),
            array('category_name' => 'Chef', 'category_slug' => '', 'sub_category_slug' => 'chef', 'parent_id' => '21'),
            array('category_name' => 'Others Services', 'category_slug' => '', 'sub_category_slug' => 'other_services', 'parent_id' => '21'),
            /* ------------------------------------------End of Sub Category For Weeding / Matrimoni-----------------------------------*/

            /* ------------------------------------------Sub Category For Music and Multimedia-----------------------------------*/
            array('category_name' => 'Singer / DJ', 'category_slug' => '', 'sub_category_slug' => 'singer_dj', 'parent_id' => '22'),
            array('category_name' => 'Lyrics Writer', 'category_slug' => '', 'sub_category_slug' => 'lyrics_writer', 'parent_id' => '22'),
            array('category_name' => 'Musical Instrument', 'category_slug' => '', 'sub_category_slug' => 'musical_instrument', 'parent_id' => '22'),
            array('category_name' => 'Music Composer', 'category_slug' => '', 'sub_category_slug' => 'music_composer', 'parent_id' => '22'),
            array('category_name' => 'Others', 'category_slug' => '', 'sub_category_slug' => 'others', 'parent_id' => '22'),

            /* ------------------------------------------End of Sub Category For Music and Multimedia-----------------------------------*/

            /* ------------------------------------------Sub Category For Loan and Insurance-----------------------------------*/
            array('category_name' => 'NGO', 'category_slug' => '', 'sub_category_slug' => 'ngo', 'parent_id' => '23'),
            array('category_name' => 'Bank', 'category_slug' => '', 'sub_category_slug' => 'bank', 'parent_id' => '23'),
            array('category_name' => 'Investment Companies', 'category_slug' => '', 'sub_category_slug' => 'investment_companies', 'parent_id' => '23'),
            array('category_name' => 'Insurance Company', 'category_slug' => '', 'sub_category_slug' => 'insurance_company', 'parent_id' => '23'),
            array('category_name' => 'Money Changer', 'category_slug' => '', 'sub_category_slug' => 'money_changer', 'parent_id' => '23'),
            /* ------------------------------------------End of Sub Category For Loan and Insurance-----------------------------------*/

            /* ------------------------------------------Sub Category For Legal/Law-----------------------------------*/
            array('category_name' => 'Accounts & Audit Services', 'category_slug' => '', 'sub_category_slug' => 'accounts_n_audit_services', 'parent_id' => '24'),
            array('category_name' => 'Tax Consultants', 'category_slug' => '', 'sub_category_slug' => 'tax_consultants', 'parent_id' => '24'),
            array('category_name' => 'Lawyers', 'category_slug' => '', 'sub_category_slug' => 'lawers', 'parent_id' => '24'),
            array('category_name' => 'Legal Services', 'category_slug' => '', 'sub_category_slug' => 'legal_services', 'parent_id' => '24'),
            array('category_name' => 'Wills & Trusts', 'category_slug' => '', 'sub_category_slug' => 'wills_n_trusts', 'parent_id' => '24'),
            array('category_name' => 'Others', 'category_slug' => '', 'sub_category_slug' => 'other_service', 'parent_id' => '24'),
            /* ------------------------------------------End of Sub Category For Legal/Law-----------------------------------*/


            /* ------------------------------------------Sub Category For Education & Immigration -----------------------------------*/
            array('category_name' => 'Baby Schools', 'category_slug' => '', 'sub_category_slug' => 'baby_schools', 'parent_id' => '25'),
            array('category_name' => 'Coaching Center', 'category_slug' => '', 'sub_category_slug' => 'coaching_center', 'parent_id' => '25'),
            array('category_name' => 'Training Center', 'category_slug' => '', 'sub_category_slug' => 'training_center', 'parent_id' => '25'),
            array('category_name' => 'Polytechnic Institute', 'category_slug' => '', 'sub_category_slug' => 'polytechnic_institute ', 'parent_id' => '25'),
            array('category_name' => 'Teacher / Tutor', 'category_slug' => '', 'sub_category_slug' => 'teacher_tutor ', 'parent_id' => '25'),
            array('category_name' => 'School & College', 'category_slug' => '', 'sub_category_slug' => 'school_n_college', 'parent_id' => '25'),
            array('category_name' => 'Immigration Consultant', 'category_slug' => '', 'sub_category_slug' => 'immigration_consultant', 'parent_id' => '25'),
            array('category_name' => 'Study Abroad', 'category_slug' => '', 'sub_category_slug' => 'study_abroad', 'parent_id' => '25'),
            array('category_name' => 'University', 'category_slug' => '', 'sub_category_slug' => 'university', 'parent_id' => '25'),
            /* ------------------------------------------End of Sub Category For Education & Immigration  -----------------------------------*/


        ));

        $result = $command->execute();
        if ($result) {
            echo "Data Inserted Successfully";
        } else {
            echo " Unable to Insert Data. Something Went Wrong...!!!!!!";
        }


    }

    public function actionListAd($country_code = '')
    {
        $requested_country = Generic::checkValidCountryRequest($country_code);
        $country_details =  Generic::checkForStoredCountry();

        if($country_code && !$requested_country){
            return ;
        }

        $limit = 10;                                 //how many items to show per page
        $page = @$_GET['page'];
        if($page)
            $start = ($page - 1) * $limit;          //first item to display on this page
        else
            $start = 0;






        $offset = Yii::app()->request->getParam('offset', 0);;
        $table = 'tbl_ads';
        $ad_type = 'ads';
        $job_categories = array(12, 128, 129, 130, 131);
        $category_slug = Yii::app()->request->getParam('category_slug');
        $sub_category_slug = Yii::app()->request->getParam('sub_category_slug');
        $location = Yii::app()->request->getParam('location','');
        $category_id = Generic::getCategoryId($category_slug, $sub_category_slug);
        if (in_array($category_id, $job_categories)) {
            $table = 'tbl_jobs';
            $ad_type = 'jobs';
        }
        $category_details = Category::model()->findByPk($category_id);
        $condition = Yii::app()->request->getParam('condition');
        $condition_array = array(
            'active'=> array(1)
        );

        if($condition) {
            $condition_array['ad_condition'] = $condition;
        }

        $sub_category_name = "";
        if (!$category_details->parent_id) {

            $all_sub_category_id = Generic::getAllSubCategoriesId($category_details->category_id);
            $sub_categories_id = Generic::getSubcategoryId($all_sub_category_id);
            $ad_details = Generic::getAdDetailsFromCategory($sub_categories_id, $condition_array, $table,$country_code, $limit, $start);
            $number_ad_details = count(Generic::getAdDetailsFromCategory($sub_categories_id, $condition_array, $table,$country_code));
            $max_price = Generic::getMaximumPrice($sub_categories_id,$country_code);
            $min_price = Generic::getMinimunPrice($sub_categories_id,$country_code);
            $category_image= Generic::getCategoryImageFromSlug($category_slug);


        } else {

            $ad_details = Generic::getAdDetailsFromCategory($category_details->category_id, $condition_array, $table, $country_code, $limit, $start);
            $sub_category_parent = Category::model()->findByPk($category_details->parent_id);
            $sub_category_name = $sub_category_parent->category_name;
            $number_ad_details = count(Generic::getAdDetailsFromCategory($category_details->category_id, $condition_array, $table,$country_code));
            $max_price = Generic::getMaximumPrice($category_id,$country_code);
            $min_price = Generic::getMinimunPrice($category_id,$country_code);
            $parent_id = Generic::getParentId(false,$sub_category_slug);
            $category_slugs = Generic::getCategorySlagFromParentId($parent_id);
            $category_image= Generic::getCategoryImageFromSlug($category_slugs[0]['category_slug']);


        }

        $all_category_name = Generic::getAllCategory();
        $all_sub_category = Generic::getAllSubcategoryData($category_id);
        $parent_category_id = $category_details->parent_id ? $category_details->parent_id : $category_details->category_id;

        $category_name = $category_details->category_name;

        $parentId = Generic::getParentIdFromSubcategorySlug($sub_category_slug);

        $opt = array(
            'w' => '320',
            'h' => '250',
            'c' => 'fill',
            'g' => 'center',
            'r' => '0'
        );


        $left_panel_rb_count = count(Generic::getHomePageRightSideAds('left_panel_rb',0,0,$country_code));
        $left_panel_rb_count_offset = rand(0,$left_panel_rb_count-1);
        $left_panel_rb_ads = Generic::getHomePageRightSideAds('left_panel_rb',1,$left_panel_rb_count_offset,$country_code);

        $left_panel_rx_count = count(Generic::getHomePageRightSideAds('left_panel_rx',0,0,$country_code));
        $left_panel_rx_count_offset = rand(0,$left_panel_rx_count-1);
        $left_panel_rx_ads = Generic::getHomePageRightSideAds('left_panel_rx',1,$left_panel_rx_count_offset,$country_code);


        $left_panel_rc_count = count(Generic::getHomePageRightSideAds('left_panel_rc',0,0,$country_code));
        $left_panel_rc_count_offset = rand(0,$left_panel_rc_count-1);
        $left_panel_rc_ads = Generic::getHomePageRightSideAds('left_panel_rc',1,$left_panel_rc_count_offset,$country_code);

        $left_panel_rd_count = count(Generic::getHomePageRightSideAds('left_panel_rd',0,0,$country_code));
        $left_panel_rd_count_offset = rand(0,$left_panel_rd_count-1);
        $left_panel_rd_ads = Generic::getHomePageRightSideAds('left_panel_rd',1,$left_panel_rd_count_offset,$country_code);
        /* ===================== Pagination Code Starts ================== */
        $adjacents = 7;
        $total_pages = $number_ad_details;
        //$targetpage = $current_url;
        $remove_Page = true;
        $targetpage="?";
        if($remove_Page){
            $targetpage = Yii::app()->request->requestUri;
            if(isset($_GET['page'])){
                $targetpage = str_replace('&page='.$_GET["page"] , '', $targetpage);
            }
            $targetpage="$targetpage";
        }





        if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
        $prev = $page - 1;                          //previous page is page - 1
        $next = $page + 1;                          //next page is page + 1
        $lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1;
        $pagination = "";
        if($lastpage > 1)
        {
            $pagination .= "<div class=\"pagination\">";
            if ($page > 1)
                $pagination.= "<a href=\"$targetpage&page=$prev\">&#171; Previous</a>";
            else
                $pagination.= "<span class=\"disabled\">&#171; Previous</span>";
            if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
            {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                }
            }
            elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
            {
                if($page < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                    }
                    $pagination.= "...";
                    $pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
                    $pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";
                }
                elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $pagination.= "<a href=\"$targetpage&page=1\">1</a>";
                    $pagination.= "<a href=\"$targetpage&page=2\">2</a>";
                    $pagination.= "...";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                    }
                    $pagination.= "...";
                    $pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
                    $pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";
                }
                else
                {
                    $pagination.= "<a href=\"$targetpage&page=1\">1</a>";
                    $pagination.= "<a href=\"$targetpage&page=2\">2</a>";
                    $pagination.= "...";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";
                    }
                }
            }
            if ($page < $counter - 1)
                $pagination.= "<a href=\"$targetpage&page=$next\">Next &#187;</a>";
            else
                $pagination.= "<span class=\"disabled\">Next &#187;</span>";
            $pagination.= "</div>\n";
        }
        /* ===================== Pagination Code Ends ================== */
        if($category_details->meta_description) {
            $this->description = $category_details->meta_description;
        }

        if($category_details->meta_title) {
            $this->title = $category_details->meta_title;
        }

        /*Selecting states based on country_code*/
        $result = Generic::getCountryCodeByShortName($country_code);
        $country_code ? $states = Generic::getStates($result[0]['id']) : $states = Generic::getStates($country_details->id);

        $this->render('index', array(
            'parent_category' => $category_details,
            'parent_category_id' => $parent_category_id,
            'category_slug' => $category_slug,
            'sub_category_slug' => $sub_category_slug,
            'all_sub_category' => $all_sub_category,
            'all_category_name' => $all_category_name,
            'category_name' => $category_name,
            'category_id' => $category_id,
            'parentId' => $parentId,
            'sub_category_name' => $sub_category_name,
            'ad_type' => $ad_type,
            'opt' => $opt,
            'total_records' => $number_ad_details,
            'offset' => $offset,
            'ad_details' => $ad_details,
            'left_panel_rb_ads' => $left_panel_rb_ads,
            'left_panel_rx_ads' => $left_panel_rx_ads,
            'left_panel_rc_ads' => $left_panel_rc_ads,
            'left_panel_rd_ads' => $left_panel_rd_ads,
            'maximum_price' => $max_price,
            'minimum_price' => $min_price,
            'category_banner_image' => $category_image,
            'location' => $location,
            'pagination'=>$pagination,
            'country_code' => $country_code,
            'states' => $states

        ));


    }
    public function actionListAdUsingAjax()
    {
        $response = array();
        $table = 'tbl_ads';
        $ad_type = 'ads';
        $job_categories = array(12, 128, 129, 130, 131);
        $category_slug = Yii::app()->request->getParam('category_slug', '');
        $sub_category_slug = Yii::app()->request->getParam('sub_category_slug', '');
        $page_num = Yii::app()->request->getParam('pagenum', '1');
        $show = Yii::app()->request->getParam('show', '1');
        $view_type = Yii::app()->request->getParam('view', 'list');
        $condition = Yii::app()->request->getParam('condition');
        $maximum_price = Yii::app()->request->getParam('maximum_price');
        $minimum_price = Yii::app()->request->getParam('minimum_price');
        $is_featured = Yii::app()->request->getParam('is_featured',0);
        $is_premium = Yii::app()->request->getParam('is_premium',0);
        $is_top = Yii::app()->request->getParam('is_top',0);
        $is_hot = Yii::app()->request->getParam('is_hot',0);
        $location= Yii::app()->request->getParam('location','');
        $locations= Yii::app()->request->getParam('locations','');
        $business_type= Yii::app()->request->getParam('business_type','');
        $country_code = Yii::app()->request->getParam('country_code','');;

        if($location == 'Select Location') {
            $location = '';
        }


        $condition_array = array(
            'active'=> array(1)
        );

        if($condition && count($condition)<2) {
            $condition_array['ad_condition'] = $condition;
        }
        if($locations && count($locations)) {
            $condition_array['location'] = $locations;
        }

        $category_id = Generic::getCategoryId($category_slug, $sub_category_slug);
        if (in_array($category_id, $job_categories)) {
            $table = 'tbl_jobs';
            $ad_type = 'jobs';
        }
        $category_details = Category::model()->findByPk($category_id);

        if (!$category_details->parent_id) {
            $all_sub_category_id = Generic::getAllSubCategoriesId($category_details->category_id);
            $sub_categories_id = Generic::getSubcategoryId($all_sub_category_id);

            $allAds = Generic::getAdDetailsFromCategory($sub_categories_id, $condition_array, $table, $country_code,0,0,$maximum_price,$minimum_price,$is_featured,$is_premium,$is_hot,$is_top,$location,false,$business_type);

            $business_type_personal = Generic::getBusinessType($sub_categories_id,'personal',$condition_array,$maximum_price,$minimum_price,$is_featured,$is_premium,$is_hot,$is_top,$country_code);
            $business_type_business = Generic::getBusinessType($sub_categories_id,'business',$condition_array,$maximum_price,$minimum_price,$is_featured,$is_premium,$is_hot,$is_top,$country_code);
            $business_type_promotion= Generic::getBusinessType($sub_categories_id,'promotion',$condition_array,$maximum_price,$minimum_price,$is_featured,$is_premium,$is_hot,$is_top,$country_code);
            $cnt = count($allAds);
            //Calculate the last page based on total number of rows and rows per page.

            $last = ceil($cnt / $show);
            if ($page_num < 1) {
                $page_num = 1;
            } elseif ($page_num > $last) {
                $page_num = $last;
            }

            $offset = ($page_num - 1) * $show;
            $ad_details = Generic::getAdDetailsFromCategory($sub_categories_id, $condition_array, $table, $country_code,$show,$offset,$maximum_price,$minimum_price,$is_featured,$is_premium,$is_hot,$is_top,$location,'id desc',$business_type);

        } else {
            $allAds = Generic::getAdDetailsFromCategory($category_details->category_id, $condition_array, $table,$country_code,0,0,$maximum_price,$minimum_price,$is_featured,$is_premium,$is_hot,$is_top,$location,false,$business_type);
            $cnt = count($allAds);

            $business_type_personal = Generic::getBusinessType($category_details->category_id,'personal',$condition_array,$maximum_price,$minimum_price,$is_featured,$is_premium,$is_hot,$is_top,$country_code);
            $business_type_business = Generic::getBusinessType($category_details->category_id,'business',$condition_array,$maximum_price,$minimum_price,$is_featured,$is_premium,$is_hot,$is_top,$country_code);
            $business_type_promotion = Generic::getBusinessType($category_details->category_id,'promotion',$condition_array,$maximum_price,$minimum_price,$is_featured,$is_premium,$is_hot,$is_top,$country_code);
            $last = ceil($cnt / $show);

            if ($page_num < 1) {
                $page_num = 1;
            } elseif ($page_num > $last) {
                $page_num = $last;
            }

            $offset = ($page_num - 1) * $show;
            $ad_details = Generic::getAdDetailsFromCategory($category_details->category_id, $condition_array, $table,$country_code,$show,$offset,$maximum_price,$minimum_price,$is_featured,$is_premium,$is_hot,$is_top,$location,'id desc',$business_type);

        }


        $ad_result_html = 'Result Showing '.count($ad_details).' of '.$cnt.' Ads';

        $current_date = date('Y-m-d');
        $baseUrl = Yii::app()->request->baseUrl;
        $opt = array(
            'w' => '320',
            'h' => '250',
            'c' => 'fill',
            'g' => 'center',
            'r' => '0'
        );
        $loaded_html_list = '';
        $loaded_html_grid = '';
        $loaded_html = '';
        $condition_block = '';
        $condition_block_price = '';

        $list_view ="display: block" ;
        $grid_view = "display: block";
        if($view_type == 'list'){

            $grid_view = "display: none";
        }else{

            $list_view ="display: none" ;

        }
        $favorite_ads = Generic::getAllFavoritesAds();
        
        foreach ($ad_details as $ad) {

            $ads_id = $ad['id'];

            if($business_type){
                $ads_id = $ad['ads_id'];
            }

            $ad_url = Generic::getAdUrlFromAdId($ads_id,$country_code);

            $discount = isset($ad['discount']) ? round($ad['discount']) : '';
            $total_price = isset($ad['price']) ? $ad['price'] : '';
            $discounted_total = $total_price - ($total_price * ($discount/100));
            $fav_params = "this,'".$ads_id."'";
            $images = json_decode($ad['image_url']);

            $show_label = Generic::checkLabel($ad);

            if($ad_type == 'ads') {
                $expire_date = isset($ad['expire_date']) ? $ad['expire_date'] : '';
            } else {
                $expire_date = isset($ad['deadline']) ? $ad['deadline'] : '';
            }

            $word_count = 50;
            $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', strip_tags($ad['description']));
            $string = str_replace("\n", " ", $string);
            $array = explode(" ", $string);
            $seemore = '<span class="text-bold">.....See More ! <span>';
            if (count($array)<= $word_count)
            {

                $retval =  $string;
            }

            else
            {
                array_splice($array, $word_count);
                $retval = implode(" ", $array).$seemore;
            }



            $favorites_class = "";
            $favorites_title = "Ad as favorite";
            if(in_array($ads_id,$favorite_ads)){
                    $favorites_class = "favorite-active";
                    $favorites_title = "Remove From favorite";

            }

            if($ad['show_price']) {
                if ($ad_type == 'ads') {
                    if ($ad['ad_condition']) {
                        $condition_block = '<div class="new-label new-top-right">New</div>';
                    }
                    $price_range = '';
                    if ($ad['price_end'] != null && $ad['price_end'] != $ad['price'] && $ad['price_end']) {
                        $price_range = ' - ' . $ad['price_end'];
                    }
                    if ($ad['discount']) {
                        $condition_block_price = '<span>&#2547; ' . $discounted_total . '</span>
															<del>&#2547; ' . $ad['price'] . $price_range . '</del>';
                    } else {
                        $condition_block_price = '<span>&#2547; ' . $ad['price'] . $price_range . '</span>';
                    }
                } else {

                    $condition_block_price = '<span>&#2547; ' . $ad['price'] . '</span>';
                }
            } else {
                $condition_block_price = '';
            }

                $discount = "";



                $ad_id = $ads_id;
                $ad_views = Generic::getTotalAdView($ad_id);
                $view_count = array_sum(array_column($ad_views, 'view_count'));

                $favorite_counter = 0;
                $favorites = Favorites::model()->findAll();
                foreach ($favorites as $favorite) {
                    $ad_array = explode(',',$favorite->ad_id);
                    if(in_array($ad_id,$ad_array)) {
                        $favorite_counter++;
                    }
                }
                $opt_list = array(
                    'h' => '360',
                    'g' => 'center',
                    'r' => '0',
                    'c' => 'pad'
                );


            $loaded_html_grid .= '<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="item-product">
												<div class="product-thumb">
													<a class="product-thumb-link" target="_blank" href="'.$ad_url.'">
														<img class="first-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
														<img class="second-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
													</a>
													<div class="product-info-cart">
														<div class="product-extra-link">
															<a href="javascript:void(0);" class="wishlist-link favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')"><i class="fa fa-heart-o"></i></a>
															<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
															<a href="javascript:void(0);" data-item="'.$ad['id'].'" onclick="showAdPreviewModal('.$ads_id.')" class="quickview-link"><i class="fa fa-search"></i></a>
														</div>
														<a class="addcart-link" target="_blank" href="'.$ad_url.'"><i class="fa fa-eye"></i> View Details</a>
													</div>
												</div>
												'.$show_label.'
												<div class="product-info">
													<h3 class="title-product"><a target="_blank" href="'.$ad_url.'">'.$ad['title'].'</a></h3>
													<div class="info-price">
												'.$condition_block_price.'
													</div>

												</div>
											</div>
										</li>';




                $loaded_html_list .= '<li>
                                           <div class="item-product">
												<div class="row">
												'.$show_label.'
													<div class="col-md-4 col-sm-12 col-xs-12">
														<div class="product-thumb">
															<a class="product-thumb-link" target="_blank" href="'.$ad_url.'">
																<img class="first-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
																<img class="second-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
															</a>
														</div>
													</div>
													<div class="col-md-8 col-sm-12 col-xs-12">
														<div class="product-info">
															<h3 class="title-product"><a target="_blank" href="'.$ad_url.'">'.$ad['title'].'</a><span class="verified-tag" style="font-size: 18px; padding-left: 8px; vertical-align: top; cursor: pointer;" title="Verified"><i class="fa fa-check" aria-hidden="true" style="padding: 0px; border-radius: 15px; background: green; color: #fff;"></i></span></h3>
															<div class="info-price">
																'.$condition_block_price.'
															</div>

															<div class="product-code">
																<label>Ad ID: </label> <span>#'.$ads_id.'</span>
															</div>
															<div class="product-stock">
																<label>Availability: </label> <span>In stock</span>
															</div>
															<br>
															<div class="product-stock">
																 <span><i class="fa fa-map-marker" style="color: #0083c9;"></i> '. $ad['location'] .' </span>   <i class="fa fa-heart" style="color: #0083c9;margin-left:10px"></i> <span class="favourite">  '.$favorite_counter.'</span>
															</div>



                                                               <div class="product-info-cart">
																<a class="addcart-link" target="_blank" href="'.$ad_url.'"><i class="fa fa-eye"></i>View Details</a>
																<div class="product-extra-link">
																	<a href="javascript:void(0);" class="wishlist-link favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')"><i class="fa fa-heart-o"></i></a>
															<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
															<a href="javascript:void(0);" data-item="'.$ads_id.'" onclick="showAdPreviewModal('.$ads_id.')" class="quickview-link"><i class="fa fa-search"></i></a>
																</div>
															</div>
														</div>
														<p class="product-desc">'.$retval.'</p>
													</div>
												</div>
											</div>
										</li>';
        }




        if($ad_details){
            $num_row_option_array = array(12,16,20);
            $option_block = '';
            foreach($num_row_option_array as $row){
                if($show==$row){
                    $option_block .= '<option value="'.$row.'"  selected="selected" >'.$row.'</option>';
                }else{
                    $option_block .= '<option value="'.$row.'"  >'.$row.'</option>';
                }

            }

            $loaded_html .='<table width="100%" border="0" cellspacing="0" cellpadding="2"  align="center">
                         <tr>
                            <td valign="top" align="left">
                            <label> Rows Limit:
                             <select name="show" onChange="changeDisplayRowCount(this.value);">
                             '.$option_block.'
                       </select>
                       </label>
                        <td valign="top" align="center" >';


            $loaded_html .= " ";
            $cnt = ceil($cnt/$show);

             $loaded_html .= '<ul class="paginations">';

             $right_links = $page_num + 3;
             $previous = $page_num - 3; //previous link
             $next = $page_num + 1; //next link
             $first_link = true; //boolean var to decide our first link

              if ($page_num > 1) {
                    $previous_link = ($previous == 0) ? 1 : $previous;
                    $loaded_html .= '<li class="first"><a href="javascript:void(0);" data-page="1" onclick="changePage(' . $show . ', 1);" title="First">First Page</a></li>'; //first link
                    $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $previous_link . '" onclick="changePage(' . $show . ', ' . ($page_num - 1) . ');" title="Previous">Previous</a></li>'; //previous link
                    for ($i = ($page_num - 2); $i < $page_num; $i++) { //Create left-hand side links
                        if ($i > 0) {
                            $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $i . '" onclick="changePage(' . $show . ', ' . $i . ');" title="Page' . $i . '">' . $i . '</a></li>';
                        }
                    }
                    $first_link = false; //set first link to false
              }

              if ($first_link) { //if current active page is first link
                    $loaded_html .= '<li class="first active">' . $page_num . '</li>';
              } elseif ($page_num == $cnt) { //if it's the last active link
                    $loaded_html .= '<li class="last active">' . $page_num . '</li>';
              } else { //regular current link
                    $loaded_html .= '<li class="active">' . $page_num . '</li>';
              }

              for ($i = $page_num + 1; $i < $right_links; $i++) { //create right-hand side links
                    if ($i <= $cnt) {
                        $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $i . '" onclick="changePage(' . $show . ', ' . $i . ');" title="Page ' . $i . '">' . $i . '</a></li>';
                    }
                }
                if ($page_num < $cnt) {
                    $next_link = ($i > $cnt) ? $cnt : $i;
                    $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $next_link . '" onclick="changePage(' . $show . ', ' . ($page_num + 1) . ');" title="Next">Next</a></li>'; //next link
                    $loaded_html .= '<li class="last"><a href="javascript:void(0);" data-page="' . $cnt . '" onclick="changePage(' . $show . ', ' . $last . ');" title="Last">Last Page</a></li>'; //last link
                }

                $loaded_html .= '</ul>';


            $loaded_html .='</td>
	         <td align="right" valign="top">
                 Page '.$page_num.' of '. $last.'
                </td>
               </tr>
              </table>';}


        if(empty($ad_details)){
            $message = "No Ads Found";
            $loaded_html = '<div class="warning">'.$message.'<br><br></div>';
        }


        $response['html'] = html_entity_decode($loaded_html);
        $response['list'] = html_entity_decode($loaded_html_list);
        $response['grid'] = html_entity_decode($loaded_html_grid);
        $response['ad_result_block'] = $ad_result_html;
        $response['personal'] = $business_type_personal;
        $response['business'] = $business_type_business;
        $response['promotion'] = $business_type_promotion;
        echo json_encode($response);


    }

    public function actionListFavoriteAdUsingAjax($country_code = '')
    {
        $response = array();
        $table = 'tbl_ads';
        $ad_type = 'ads';
        $job_categories = array(12, 128, 129, 130, 131);

        $page_num = Yii::app()->request->getParam('pagenum', '1');
        $show = Yii::app()->request->getParam('show', '1');
        $view_type = Yii::app()->request->getParam('view', 'list');
        $filter_value = Yii::app()->request->getParam('filter_value',3);
            $allAds = Generic::getAllFavoritesAds($filter_value);
            $cnt = count($allAds);
            //Calculate the last page based on total number of rows and rows per page.
            $last = ceil($cnt / $show);

            if ($page_num < 1) {
                $page_num = 1;
            } elseif ($page_num > $last) {
                $page_num = $last;
            }

            $offset = ($page_num - 1) * $show;
            $ads = Generic::getAllFavoritesAds($filter_value,$show,$offset);

        $ad_details = Generic::getAds($ads);

        $ad_result_html = 'Result Showing '.count($ad_details).' of '.$cnt.' Ads';

        $current_date = date('Y-m-d');
        $baseUrl = Yii::app()->request->baseUrl;
        $opt = array(
            'w' => '320',
            'h' => '250',
            'c' => 'fill',
            'g' => 'center',
            'r' => '0'
        );
        $loaded_html_list = '';
        $loaded_html_grid = '';
        $loaded_html = '';
        $condition_block = '';

        $list_view ="display: block" ;
        $grid_view = "display: block";
        if($view_type == 'list'){

            $grid_view = "display: none";
        }else{

            $list_view ="display: none" ;

        }
        $favorite_ads = Generic::getAllFavoritesAds();
        $show_all_block = "";
        $show_favorite_block = "";
        $show_view_all_block = "";
        if($filter_value == 1) {
            $show_favorite_block = "checked";
        } else if($filter_value == 2) {
            $show_view_all_block = "checked";
        } else if($filter_value == 3) {
            $show_all_block = "checked";
        }
        $filter_block = '<ul class="favorite_filter"><li>
			<input type="radio" id="f-option" name="selector" '.$show_all_block.' value="3" onclick="changeFilterValue(this.value)">
			<label for="f-option">Show all</label>
			<div class="check"></div>
		</li><li>
			<input type="radio" id="s-option" name="selector" '.$show_favorite_block.' value="1" onclick="changeFilterValue(this.value)">
			<label for="s-option">Show only favorites</label>
			<div class="check">
				<div class="inside"></div>
			</div>
		</li><li>
			<input type="radio" id="t-option" name="selector" '.$show_view_all_block.' value="2" onclick="changeFilterValue(this.value)">
			<label for="t-option">Show only recently viewed</label>
			<div class="check">
				<div class="inside"></div>
			</div>
		</li></ul><div style="clear:both"></div>';

       // $loaded_html .= $filter_block;
        foreach ($ad_details as $ad) {
            $ad_url = Generic::getAdUrlFromAdId($ad['id'],$country_code);
            $discount = isset($ad['discount']) ? round($ad['discount']) : '';
            $total_price = isset($ad['price']) ? $ad['price'] : '';
            $discounted_total = $total_price - ($total_price * ($discount/100));
            $fav_params = "this,'".$ad['id']."'";
            $images = json_decode($ad['image_url']);
            if($ad_type == 'ads') {
                $expire_date = isset($ad['expire_date']) ? $ad['expire_date'] : '';
            } else {
                $expire_date = isset($ad['deadline']) ? $ad['deadline'] : '';
            }
            $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $ad['description']);
            $string = str_replace("\n", " ", $string);
            $array = explode(" ", $string);
            $seemore = '<span class="text-bold">.....See More ! <span>';
            $word_count =50;
            if (count($array)<= $word_count)
            {

                $retval =  $string;
            }
            else
            {
                array_splice($array, $word_count);
                $retval = implode(" ", $array).$seemore;
            }
            if ($expire_date >= $current_date) {
                $favorites_class = "";
                $favorites_title = "Ad as favorite";
                if(in_array($ad['id'],$favorite_ads)){
                    $favorites_class = "favorite-active";
                    $favorites_title = "Remove From favorite";

                }
                if($ad['show_price']) {
                    if ($ad_type == 'ads') {
                        if ($ad['ad_condition']) {
                            $condition_block = '<div class="new-label new-top-right">New</div>';
                        }
                        if ($ad['discount']) {
                            $condition_block_price = '<span>&#2547; ' . $discounted_total . '</span>
															<del>&#2547; ' . $ad['price'] . '</del>';
                        } else {
                            $condition_block_price = '<span>&#2547; ' . $ad['price'] . '</span>';
                        }
                    } else {

                        $condition_block_price = '<span>&#2547; ' . $ad['price'] . '</span>';
                    }
                } else {
                    $condition_block_price = '';
                }
                $discount = "";
                if($ad['discount']){
                    $discount = '<div class="new-top-left""><strong style="font-weight: bold; margin-left: -14px">'.round($ad['discount']).'%Off</strong></div>';
                }

                $ad_id = $ad['id'];
                $ad_views = Generic::getTotalAdView($ad_id);
                $view_count = array_sum(array_column($ad_views, 'view_count'));

                $favorite_counter = 0;
                $favorites = Favorites::model()->findAll();
                foreach ($favorites as $favorite) {
                    $ad_array = explode(',',$favorite->ad_id);
                    if(in_array($ad_id,$ad_array)) {
                        $favorite_counter++;
                    }
                }

                $opt_list = array(
                    'w' => '300',
                    'h' => '360',
                    'g' => 'center',
                    'r' => '0'
                );

                $loaded_html_grid .= '<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="item-product">
												<div class="product-thumb">
													<a class="product-thumb-link" target="_blank" href="<?=$ad_url?>">
														<img class="first-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
														<img class="second-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
													</a>
													<div class="product-info-cart">
														<div class="product-extra-link">
															<a href="javascript:void(0);" class="wishlist-link favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')"><i class="fa fa-heart-o"></i></a>
															<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
															<a href="javascript:void(0);" data-item="'.$ad['id'].'" onclick="showAdPreviewModal('.$ad['id'].')" class="quickview-link"><i class="fa fa-search"></i></a>
														</div>
														<a class="addcart-link" target="_blank" href="'.$ad_url.'"><i class="fa fa-eye"></i> View Details</a>
													</div>
												</div>
												<div class="product-info">
													<h3 class="title-product"><a target="_blank" href="'.$ad_url.'">'.$ad['title'].'</a></h3>
													<div class="info-price">
												'.$condition_block_price.'
													</div>

												</div>
											</div>
										</li>';




                $loaded_html_list .= '<li>
                                           <div class="item-product">
												<div class="row">
													<div class="col-md-4 col-sm-12 col-xs-12">
														<div class="product-thumb">
															<a class="product-thumb-link" target="_blank" href="'.$ad_url.'">
																<img class="first-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
																<img class="second-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
															</a>
														</div>
													</div>
													<div class="col-md-8 col-sm-12 col-xs-12">
														<div class="product-info">
															<h3 class="title-product"><a target="_blank" href="'.$ad_url.'">'.$ad['title'].'</a><span class="verified-tag" style="font-size: 18px; padding-left: 8px; vertical-align: top; cursor: pointer;" title="Verified"><i class="fa fa-check" aria-hidden="true" style="padding: 0px; border-radius: 15px; background: green; color: #fff;"></i></span></h3>
															<div class="info-price">
																'.$condition_block_price.'
															</div>

															<div class="product-code">
																<label>Ad ID: </label> <span>#'.$ad['ad_id'].'</span>
															</div>
															<div class="product-stock">
																<label>Availability: </label> <span>In stock</span>
															</div>
															<div class="product-stock">
																<span><i class="fa fa-map-marker" style="color: #0083c9;"></i> '. $ad['location'] .' </span> <i class="fa fa-heart" style="color: #0083c9;margin-left:10px"></i> <span class="favourite">  '.$favorite_counter.'</span>
															</div>


                                                                                    <div class="product-info-cart">
																<a class="addcart-link" target="_blank" href="'.$ad_url.'"><i class="fa fa-eye"></i>View Details</a>
																<div class="product-extra-link">
																	<a href="javascript:void(0);" class="wishlist-link favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')"><i class="fa fa-heart-o"></i></a>
															<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
															<a href="javascript:void(0);" data-item="'.$ad['id'].'" onclick="showAdPreviewModal('.$ad['id'].')" class="quickview-link"><i class="fa fa-search"></i></a>
																</div>
															</div>
														</div>
														<p class="product-desc">'.$retval.'</p>
													</div>
												</div>
											</div>
										</li>';
            }
        }
        if($ad_details){ $num_row_option_array = array(12,16,20);
            $option_block = '';
            foreach($num_row_option_array as $row){
                if($show==$row){
                    $option_block .= '<option value="'.$row.'"  selected="selected" >'.$row.'</option>';
                }else{
                    $option_block .= '<option value="'.$row.'"  >'.$row.'</option>';
                }

            }

            $loaded_html .='<table width="100%" border="0" cellspacing="0" cellpadding="2"  align="center">
                         <tr>
                            <td valign="top" align="left">
                            <label> Ads Per Page:
                             <select name="show" id="show"  onChange="changeDisplayRowCount(this.value);">
                             '.$option_block.'
                       </select>
                       </label>
                        <td valign="top" align="center" >';

            $loaded_html .= " ";
            $cnt = ceil($cnt/$show);

            $loaded_html .= '<ul class="paginations">';

            $right_links = $page_num + 3;
            $previous = $page_num - 3; //previous link
            $next = $page_num + 1; //next link
            $first_link = true; //boolean var to decide our first link

            if ($page_num > 1) {
                $previous_link = ($previous == 0) ? 1 : $previous;
                $loaded_html .= '<li class="first"><a href="javascript:void(0);" data-page="1" onclick="changePage(' . $show . ', 1);" title="First">First Page</a></li>'; //first link
                $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $previous_link . '" onclick="changePage(' . $show . ', ' . ($page_num - 1) . ');" title="Previous">Previous</a></li>'; //previous link
                for ($i = ($page_num - 2); $i < $page_num; $i++) { //Create left-hand side links
                    if ($i > 0) {
                        $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $i . '" onclick="changePage(' . $show . ', ' . $i . ');" title="Page' . $i . '">' . $i . '</a></li>';
                    }
                }
                $first_link = false; //set first link to false
            }

            if ($first_link) { //if current active page is first link
                $loaded_html .= '<li class="first active">' . $page_num . '</li>';
            } elseif ($page_num == $cnt) { //if it's the last active link
                $loaded_html .= '<li class="last active">' . $page_num . '</li>';
            } else { //regular current link
                $loaded_html .= '<li class="active">' . $page_num . '</li>';
            }

            for ($i = $page_num + 1; $i < $right_links; $i++) { //create right-hand side links
                if ($i <= $cnt) {
                    $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $i . '" onclick="changePage(' . $show . ', ' . $i . ');" title="Page ' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($page_num < $cnt) {
                $next_link = ($i > $cnt) ? $cnt : $i;
                $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $next_link . '" onclick="changePage(' . $show . ', ' . ($page_num + 1) . ');" title="Next">Next</a></li>'; //next link
                $loaded_html .= '<li class="last"><a href="javascript:void(0);" data-page="' . $cnt . '" onclick="changePage(' . $show . ', ' . $last . ');" title="Last">Last Page</a></li>'; //last link
            }

            $loaded_html .= '</ul>';

            $loaded_html .='</td>
	         <td align="right" valign="top">
                 Page '.$page_num.' of '. $last.'
                </td>
               </tr>
              </table>';}






        $response['html'] = html_entity_decode($loaded_html);
        $response['list'] = html_entity_decode($loaded_html_list);
        $response['grid'] = html_entity_decode($loaded_html_grid);
        $response['ad_result_block'] = $ad_result_html;
        $response['filter_block'] = $filter_block;
        echo json_encode($response);


    }

    /**
     * get favorite ads for profile
     */
    public function actionListFavoriteAdUsingAjaxProfile()
    {
        $filter_value = Yii::app()->request->getParam('filter_value',3);
        $ads = Generic::getAllFavoritesAds($filter_value);
        $html_block = '';
        $expire_datetime = new \DateTime();
        $expire_datetime->setTime(23, 59, 59);
        $option_array = array(
            'w' =>'84',
            'h' =>'84',
            'g'=>'center',
            'r' => '40');
        $ad_type = "ads";
        $baseUrl = Yii::app()->request->getBaseUrl(true);
        $favorite_ads = Generic::getAllFavoritesAds();
        //Generic::_setTrace($favorite_ads);
        foreach ($ads as $ad) {
            $criteria = new CDbCriteria();
            $criteria->condition = 'id = :id and active = :active and expire_date > :expire_date';
            $criteria->params = array(':id' => $ad, ':active' => 1, ':expire_date' => $expire_datetime->format('Y-m-d h:i:s'));
            $ad_details = Ads::model()->find($criteria);
            $ad_owner_details = Register::model()->findByPk($ad_details->user_id);
            $ad_expire_date = new \DateTime($ad_details->expire_date);
            $ad_expire_date->modify('1 month ago');
            $ad_images = json_decode($ad_details->image_url);

            $favorites_class = "";
            $favorites_title = "Ad as favorite";
            $fav_params = "this,'".$ad."'";
            $delete_button_block = '<a href="javascript:void(0)" onclick="deleteRecentViewRecord('.$ad_details->id.')" class="btn btn-transparent">Delete</a>';
            if(in_array($ad,$favorite_ads)){
                $favorites_class = "favorite-active";
                $favorites_title = "Remove From favorite";
                $delete_button_block = '';
            }

            $html_block .= '<div class="info-card">
                        <div class="card-inner">
                            <div class="card-icon">
                                <img src="'.ImageHelper::cloudinary($ad_images[0],$option_array).'" alt="'.$ad_details->title.'" title="'.$ad_details->title.'" />
                            </div>
                            <ul class="card-track">
                                <li><a>'.$ad_details->title.'</a></li>
                            </ul>
                            <ul class="info-list">
                                <li><i class="fa fa-map-marker"></i>'.$ad_owner_details->district.'</li>
                                <li><i class="fa fa-clock-o"></i>'.$ad_expire_date->format('d M Y').'</li>
                            </ul>
                            <ul>
                             <li><a class="link-wishlist favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')"><i class="fa fa-heart '.$favorites_class.'"></i> Favorite</a></li>
                            </ul>
                            <div class="card-actions">
                                '.$delete_button_block.'
                                <a href="' . $baseUrl . "/ad?ad_id=" . urlencode(base64_encode($ad_details->id)) . "&ad_type=" . urlencode(base64_encode($ad_type)) . '" class="btn btn-transparent" target="_blank">View</a>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-xs-12 col-md-4 text-right">
                                    <div class="custom-checkbox square-style">
                                        <input type="checkbox" id="select_'.$ad_details->id.'">
                                        <label for="select_'.$ad_details->id.'">Get notifications</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }
        $response['html'] = $html_block;
        echo json_encode($response);
    }

    public function actionGetSubCategoryAds($country_code = '')
    {
        $response = array();
        $table = 'tbl_ads';
        $ad_type = 'ads';
        $job_categories = array(12, 128, 129, 130, 131);
        $baseUrl = Yii::app()->request->baseUrl;
        $category_slug = Yii::app()->request->getParam('category_slug', '');
        $sub_category_slug = Yii::app()->request->getParam('sub_category_slug', '');
        $category_id = Generic::getCategoryId($category_slug, $sub_category_slug);
        if (in_array($category_id, $job_categories)) {
            $table = 'tbl_jobs';
            $ad_type = 'jobs';
        }
        $category_details = Category::model()->findByPk($category_id);
        if (!$category_details->parent_id) {
            $all_sub_category_id = Generic::getAllSubCategoriesId($category_details->category_id);
            $sub_categories_id = Generic::getSubcategoryId($all_sub_category_id);
            $ad_details = Generic::getAdDetailsFromCategory($sub_categories_id, '1', $table,$country_code);
        } else {
            $ad_details = Generic::getAdDetailsFromCategory($category_details->category_id, '1', $table,$country_code);
        }
        $html_data = "";

        $html_data_list = "";

        $opt = array(
            'w' => '320',
            'h' => '250',
            'c' => 'fill',
            'g' => 'center',
            'r' => '0'
        );

        foreach ($ad_details as $ad) {
            $images = json_decode($ad["image_url"]);
            if ($ad_type == 'ads') {
                $price_block = round($ad['price'], 2);
            } else {
                $price_block = $ad['salary'];
            }
            $html_data .= '<li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
						<div class="item-inner">
							<div class="item-img">
								<div class="item-img-info"><a href="' . $baseUrl . "ad?ad_id=" . urlencode(base64_encode($ad['id'])) . "&ad_type=" . urlencode(base64_encode($ad_type)) . '" title=' . $ad['title'] . ' class="product-image"><img src="' . ImageHelper::cloudinary($images[0], $opt) . '" alt="' . $ad['title'] . '"></a>
									<div class="box-hover">
										<ul class="add-to-links">
											<li><a class="link-quickview" href="quick_view.html" onclick="showAdPreviewModal('.$ad['id'].')">Quick View</a> </li>
											<li><a class="link-wishlist" href="wishlist.html">Wishlist</a> </li>
											<li><a class="link-compare" href="compare.html">Compare</a> </li>
										</ul>
									</div>
								</div>
							</div>
							<div class="item-info">
								<div class="info-inner">
									<div class="item-title"> <a title="' . $ad['title'] . '"></a>' . $ad['title'] . '</div>
									<div class="item-content">
										<div class="rating">
											<div class="ratings">
												<div class="rating-box">
													<div style="width:80%" class="rating"></div>
												</div>
												<p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
											</div>
										</div>
										<div class="item-price">
											<div class="price-box">
												<p class="special-price"><span class="price-label">Price</span> <span class="price">BDT ' . $price_block . '</span> </p>
											</div>
										</div>
										<div class="action">
											<button class="button btn-cart" type="button" title="" data-original-title="View Details" onclick="redirectToProduct(' . $ad['id'] . ',\'' . $ad_type . '\')"><span>View Details</span></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
			        ';
            $html_data_list .= '<li class="item">
                        <div class="product-image"> <a href=" ' . $baseUrl . "ad?ad_id=" . urlencode(base64_encode($ad['id'])) . "&ad_type=" . urlencode(base64_encode($ad_type)) . ' " title="' . $ad['title'] . '"> <img class="small-image" src="' . ImageHelper::cloudinary($images[0], $opt) . '" alt="' . $ad['title'] . '"> </a> </div>
                        <div class="product-shop">
                            <h2 class="product-name"><a href="' . $baseUrl . "ad?ad_id=" . urlencode(base64_encode($ad['id'])) . "&ad_type=" . urlencode(base64_encode($ad_type)) . '" title="' . $ad['title'] . '">' . $ad['title'] . '</a></h2>
                            <div class="ratings">
                                <div class="rating-box">
                                    <div style="width:50%" class="rating"></div>
                                </div>
                                <p class="rating-links"> <a href="#">1 View</a> </p>
                            </div>
                            <div class="desc std">
                                <p>' . $ad['description'] . '</p>
                            </div>
                            <div class="price-box">
                                <p class="special-price"> <span class="price-label"></span> <span class="price">BDT ' . $price_block . '</span> </p>
                            </div>
                            <div class="actions">
                                <button class="button btn-cart ajx-cart" title="View Details" type="button"  onclick="redirectToProduct(' . $ad['id'] . ',\'' . $ad_type . '\')"><span>View Details</span></button>
                            </div>
                        </div>
                    </li>';
        }
        $response['status'] = 'true';
        $response['html'] = html_entity_decode($html_data);
        $response['html2'] = html_entity_decode($html_data_list);
        echo json_encode($response);
    }


    public function actionListAllAdUsingAjax($country_code = '')
    {
        $response = array();
        $table = 'tbl_ads';
        $ad_type = 'ads';
        $page_num = Yii::app()->request->getParam('pagenum', '1');
        $show = Yii::app()->request->getParam('show', '1');
        $view_type = Yii::app()->request->getParam('view', 'list');
        $condition = Yii::app()->request->getParam('condition');
        $maximum_price = Yii::app()->request->getParam('maximum_price');
        $minimum_price = Yii::app()->request->getParam('minimum_price');
        $is_featured = Yii::app()->request->getParam('is_featured',0);
        $is_premium = Yii::app()->request->getParam('is_premium',0);
        $is_top = Yii::app()->request->getParam('is_top',0);
        $is_hot = Yii::app()->request->getParam('is_hot',0);
        $locations= Yii::app()->request->getParam('locations','');
        $condition_array = array(
            'active'=> array(1)
        );

        if($condition && count($condition)<2) {
            $condition_array['ad_condition'] = $condition;
        }
        if($locations && count($locations)) {
            $condition_array['location'] = $locations;
        }
        //$ad_count = Ads::model()->findAll();
        $ad_count = Generic::getAllAds('1', $table,false,false,$minimum_price,$maximum_price,$condition_array,$is_featured,$is_premium,$is_hot,$is_top);

       // $ad_count = Ads::model()->findAll();
        $cnt = count($ad_count);

        $last = ceil($cnt / $show);
        if ($page_num < 1) {
            $page_num = 1;
        } elseif ($page_num > $last) {
            $page_num = $last;
        }

        $offset = ($page_num - 1) * $show;
        $ad_details = Generic::getAllAds('1', $table,$show,$offset,$minimum_price,$maximum_price,$condition_array,$is_featured,$is_premium,$is_hot,$is_top);


        $business_type_personal = Generic::getBusinessTypeForAllAds('personal');
        $business_type_business = Generic::getBusinessTypeForAllAds('business');
        $business_type_promotion = Generic::getBusinessTypeForAllAds('promotion');








        $ad_result_html = 'Result Showing '.count($ad_details).' of '.$cnt.' Ads';
        $current_date = date('Y-m-d');
        $baseUrl = Yii::app()->request->baseUrl;
        $opt = array(
            'w' => '320',
            'h' => '250',
            'c' => 'fill',
            'g' => 'center',
            'r' => '0'
        );
        $loaded_html_list = '';
        $loaded_html_grid = '';
        $loaded_html = '';
        $condition_block = '';
        $condition_block_price = '';

        $list_view ="display: block" ;
        $grid_view = "display: block";
        if($view_type == 'list'){

            $grid_view = "display: none";
        }else{

            $list_view ="display: none" ;

        }
        $favorite_ads = Generic::getAllFavoritesAds();
        foreach ($ad_details as $ad) {
            $ad_url = Generic::getAdUrlFromAdId($ad['id'],$country_code);
            $discount = isset($ad['discount']) ? round($ad['discount']) : '';
            $total_price = isset($ad['price']) ? $ad['price'] : '';
            $discounted_total = $total_price - ($total_price * ($discount/100));
            $fav_params = "this,'".$ad['id']."'";
            $images = json_decode($ad['image_url']);
            if($ad_type == 'ads') {
                $expire_date = isset($ad['expire_date']) ? $ad['expire_date'] : '';
            } else {
                $expire_date = isset($ad['deadline']) ? $ad['deadline'] : '';
            }
            $word_count = 50;

            $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', strip_tags($ad['description']));
            $string = str_replace("\n", " ", $string);
            $seemore = '<span class="text-bold">.....See More ! <span>';
            $array = explode(" ", $string);
            if (count($array)<= $word_count)
            {
                $retval =  $string;
            }
            else
            {
                array_splice($array, $word_count);
                $retval = implode(" ", $array).$seemore;
            }





            if ($expire_date >= $current_date) {
                $favorites_class = "";
                $favorites_title = "Ad as favorite";
                if(in_array($ad['id'],$favorite_ads)){
                    $favorites_class = "favorite-active";
                    $favorites_title = "Remove From favorite";

                }
                if($ad['show_price']) {
                    if ($ad_type == 'ads') {
                        if ($ad['ad_condition']) {
                            $condition_block = '<div class="new-label new-top-right">New</div>';
                        }
                        $price_range = '';
                        if ($ad['price_end'] != null && $ad['price_end'] != $ad['price'] && $ad['price_end']) {
                            $price_range = ' - ' . $ad['price_end'];
                        }
                        if ($ad['discount']) {
                            $condition_block_price = '<span>&#2547; ' . $discounted_total . '</span>
															<del>&#2547; ' . $ad['price'] . $price_range . '</del>';
                        } else {
                            $condition_block_price = '<span>&#2547; ' . $ad['price'] . $price_range . '</span>';
                        }
                    } else {

                        $condition_block_price = '<span>&#2547; ' . $ad['price'] . '</span>';
                    }
                } else {
                        $condition_block_price = '';
                }
                $discount = "";
                if($ad['discount']){
                    $discount = '<div class="new-top-left""><strong style="font-weight: bold; margin-left: -14px">'.round($ad['discount']).'%Off</strong></div>';
                }

                $ad_id = $ad['id'];
                $ad_views = Generic::getTotalAdView($ad_id);
                $view_count = array_sum(array_column($ad_views, 'view_count'));

                $favorite_counter = 0;
                $favorites = Favorites::model()->findAll();
                foreach ($favorites as $favorite) {
                    $ad_array = explode(',',$favorite->ad_id);
                    if(in_array($ad_id,$ad_array)) {
                        $favorite_counter++;
                    }
                }

                $opt_list = array(
                    'w' => '300',
                    'h' => '360',
                    'g' => 'center',
                    'r' => '0'
                );
                $loaded_html_grid .= '<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="item-product">
												<div class="product-thumb">
													<a class="product-thumb-link" target="_blank" href="<?=$ad_url?>">
														<img class="first-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
														<img class="second-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
													</a>
													<div class="product-info-cart">
														<div class="product-extra-link">
															<a href="javascript:void(0);" class="wishlist-link favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')"><i class="fa fa-heart-o"></i></a>
															<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
															<a href="javascript:void(0);" data-item="'.$ad['id'].'" onclick="showAdPreviewModal('.$ad['id'].')" class="quickview-link"><i class="fa fa-search"></i></a>
														</div>
														<a class="addcart-link" target="_blank" href="'.$ad_url.'"><i class="fa fa-eye"></i> View Details</a>
													</div>
												</div>
												<div class="product-info">
													<h3 class="title-product"><a target="_blank" href="'.$ad_url.'">'.$ad['title'].'</a></h3>
													<div class="info-price">
												'.$condition_block_price.'
													</div>

												</div>
											</div>
										</li>';




                $loaded_html_list .= '<li>
                                           <div class="item-product">
												<div class="row">
													<div class="col-md-4 col-sm-12 col-xs-12">
														<div class="product-thumb">
															<a class="product-thumb-link" target="_blank" href="'.$ad_url.'">
																<img class="first-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
																<img class="second-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
															</a>
														</div>
													</div>
													<div class="col-md-8 col-sm-12 col-xs-12">
														<div class="product-info">
															<h3 class="title-product"><a target="_blank" href="'.$ad_url.'">'.$ad['title'].'</a><span class="verified-tag" style="font-size: 18px; padding-left: 8px; vertical-align: top; cursor: pointer;" title="Verified"><i class="fa fa-check" aria-hidden="true" style="padding: 0px; border-radius: 15px; background: green; color: #fff;"></i></span></h3>
															<div class="info-price">
																'.$condition_block_price.'
															</div>

															<div class="product-code">
																<label>Ad ID: </label> <span>#'.$ad['ad_id'].'</span>
															</div>
															<div class="product-stock">
																<label>Availability: </label> <span>In stock</span>
															</div>
															<div class="product-stock">
																<span><i class="fa fa-map-marker" style="color: #0083c9;"></i> '. $ad['location'] .' </span> <i class="fa fa-heart" style="color: #0083c9;margin-left:10px"></i> <span class="favourite">  '.$favorite_counter.'</span>
															</div>


                                                                                    <div class="product-info-cart">
																<a class="addcart-link" target="_blank" href="'.$ad_url.'"><i class="fa fa-eye"></i>View Details</a>
																<div class="product-extra-link">
																	<a href="javascript:void(0);" class="wishlist-link favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')"><i class="fa fa-heart-o"></i></a>
															<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
															<a href="javascript:void(0);" data-item="'.$ad['id'].'" onclick="showAdPreviewModal('.$ad['id'].')" class="quickview-link"><i class="fa fa-search"></i></a>
																</div>
															</div>
														</div>
														<p class="product-desc">'.$retval.'</p>
													</div>
												</div>
											</div>
										</li>';
            }
        }
        if($ad_details){ $num_row_option_array = array(12,16,20);
            $option_block = '';
            foreach($num_row_option_array as $row){
                if($show==$row){
                    $option_block .= '<option value="'.$row.'"  selected="selected" >'.$row.'</option>';
                }else{
                    $option_block .= '<option value="'.$row.'"  >'.$row.'</option>';
                }

            }

            $loaded_html .='<table width="100%" border="0" cellspacing="0" cellpadding="2"  align="center">
                         <tr>
                            <td valign="top" align="left">
                            <label> Ads Per Page:
                             <select name="show" onChange="changeDisplayRowCount(this.value);">
                             '.$option_block.'
                       </select>
                       </label>
                        <td valign="top" align="center" >';


            $loaded_html .= " ";
            $cnt = ceil($cnt/$show);

            $loaded_html .= '<ul class="paginations">';

            $right_links = $page_num + 3;
            $previous = $page_num - 3; //previous link
            $next = $page_num + 1; //next link
            $first_link = true; //boolean var to decide our first link

            if ($page_num > 1) {
                $previous_link = ($previous == 0) ? 1 : $previous;
                $loaded_html .= '<li class="first"><a href="javascript:void(0);" data-page="1" onclick="changePage(' . $show . ', 1);" title="First">First Page</a></li>'; //first link
                $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $previous_link . '" onclick="changePage(' . $show . ', ' . ($page_num - 1) . ');" title="Previous">Previous</a></li>'; //previous link
                for ($i = ($page_num - 2); $i < $page_num; $i++) { //Create left-hand side links
                    if ($i > 0) {
                        $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $i . '" onclick="changePage(' . $show . ', ' . $i . ');" title="Page' . $i . '">' . $i . '</a></li>';
                    }
                }
                $first_link = false; //set first link to false
            }

            if ($first_link) { //if current active page is first link
                $loaded_html .= '<li class="first active">' . $page_num . '</li>';
            } elseif ($page_num == $cnt) { //if it's the last active link
                $loaded_html .= '<li class="last active">' . $page_num . '</li>';
            } else { //regular current link
                $loaded_html .= '<li class="active">' . $page_num . '</li>';
            }

            for ($i = $page_num + 1; $i < $right_links; $i++) { //create right-hand side links
                if ($i <= $cnt) {
                    $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $i . '" onclick="changePage(' . $show . ', ' . $i . ');" title="Page ' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($page_num < $cnt) {
                $next_link = ($i > $cnt) ? $cnt : $i;
                $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $next_link . '" onclick="changePage(' . $show . ', ' . ($page_num + 1) . ');" title="Next">Next</a></li>'; //next link
                $loaded_html .= '<li class="last"><a href="javascript:void(0);" data-page="' . $cnt . '" onclick="changePage(' . $show . ', ' . $last . ');" title="Last">Last Page</a></li>'; //last link
            }

            $loaded_html .= '</ul>';

            $loaded_html .='</td>
	         <td align="right" valign="top">
                 Page '.$page_num.' of '. $last.'
                </td>
               </tr>
              </table>';}

        $response['html'] = html_entity_decode($loaded_html);
        $response['list'] = html_entity_decode($loaded_html_list);
        $response['grid'] = html_entity_decode($loaded_html_grid);
        $response['ad_result_block'] = $ad_result_html;
        $response['personal'] = $business_type_personal;
        $response['business'] = $business_type_business;
        $response['promotion'] = $business_type_promotion;
        echo json_encode($response);

    }







    public function actionListAllAdUsingAjaxForSearch($country_code = '')
    {
        $response = array();
        $table = 'tbl_ads';
        $ad_type = 'ads';
        $page_num = Yii::app()->request->getParam('pagenum', '1');
        $show = Yii::app()->request->getParam('show','1');
        $view_type = Yii::app()->request->getParam('view','list');
        $location = Yii::app()->request->getParam('location','');
        $search_string = Yii::app()->request->getParam('search_string','');

        $minimum_price = Yii::app()->request->getParam('minimum_price');
        $maximum_price = Yii::app()->request->getParam('maximum_price');
        $condition = Yii::app()->request->getParam('condition');

        $is_featured = Yii::app()->request->getParam('is_featured',0);
        $is_premium = Yii::app()->request->getParam('is_premium',0);
        $is_top = Yii::app()->request->getParam('is_top',0);
        $is_hot = Yii::app()->request->getParam('is_hot',0);
        $locations= Yii::app()->request->getParam('locations','');
        $category_id = Yii::app()->request->getParam('selected_category','');
        $business_type= Yii::app()->request->getParam('business_type','');
        $division= Yii::app()->request->getParam('division','');
        $district = Yii::app()->request->getParam('district','');
        $thana = Yii::app()->request->getParam('thana','');

        $condition_array = array(
            'active'=> array(1)
        );

        if($location != '') {
            $condition_array['location'] = array($location);
        }

        if($condition && count($condition)<2) {
            $condition_array['ad_condition'] = $condition;
        }

        $all_sub_category_id = Generic::getAllSubCategoriesId($category_id);

        $sub_categories_id = Generic::getSubcategoryId($all_sub_category_id);

        if($locations && count($locations)) {
            $condition_array['location'] = $locations;
        }
        $ad_count = Generic::getAllAdsForHomePageSearch('1',$table,0,0,$location,$search_string,$minimum_price,$maximum_price,$condition_array,$is_featured,$is_premium,$is_hot,$is_top,$sub_categories_id,$business_type,$division,$district,$thana);



        $cnt = count($ad_count);


        $last = ceil($cnt / $show);
        if ($page_num < 1) {
            $page_num = 1;
        } elseif ($page_num > $last) {
            $page_num = $last;
        }

        $offset = ($page_num - 1) * $show;
        $ad_details = Generic::getAllAdsForHomePageSearch('1',$table,$show,$offset,$location,$search_string,$minimum_price,$maximum_price,$condition_array,$is_featured,$is_premium,$is_hot,$is_top,$sub_categories_id,$business_type,$division,$district,$thana);

        $business_type_personal = Generic::getBusinessTypeForSearch($condition_array,$sub_categories_id,'personal',$search_string,$minimum_price,$maximum_price,$is_featured,$is_premium,$is_hot,$is_top,$show, $offset);
        $business_type_business = Generic::getBusinessTypeForSearch($condition_array,$sub_categories_id,'business',$search_string,$minimum_price,$maximum_price,$is_featured,$is_premium,$is_hot,$is_top,$show, $offset);
        $business_type_promotion = Generic::getBusinessTypeForSearch($condition_array,$sub_categories_id,'promotion',$search_string,$minimum_price,$maximum_price,$is_featured,$is_premium,$is_hot,$is_top,$show, $offset);





        $ad_result_html = 'Result Showing '.count($ad_details).' of '.$cnt.' Ads';

        $number_of_search_result  = count($ad_details);
        if($number_of_search_result == 0){

            $current_time = new \DateTime();
            $search = new TblSearch();
            $search->search_keyword = $search_string;
            $search->search_time =  $current_time->format('Y-m-d H:i:s');
            $search->search_result = ($number_of_search_result == 0) ? 0 :1;
            $search->user_ip = SiteConfig::GetUserIP();
            $search->save();
        }

        $current_date = date('Y-m-d');
        $baseUrl = Yii::app()->request->baseUrl;
        $opt = array(
            'w' => '320',
            'h' => '250',
            'c' => 'fill',
            'g' => 'center',
            'r' => '0'
        );
        $loaded_html_list = '';
        $loaded_html_grid = '';
        $loaded_html = '';
        $condition_block = '';
        $condition_block_price = '';

        $list_view ="display: block" ;
        $grid_view = "display: block";
        if($view_type == 'list'){

            $grid_view = "display: none";
        }else{

            $list_view ="display: none" ;

        }
        if(is_array($ad_details) && count($ad_details) > 1){
            shuffle($ad_details);
        }
        
        //$favorite_ads = Generic::getAllFavoritesAds();
        foreach ($ad_details as $ad) {

            $ads_id = $ad['id'];
            if($business_type){
                $ads_id = $ad['ads_id'];
            }

            $ad_url = Generic::getAdUrlFromAdId($ads_id,$country_code);

            $discount = isset($ad['discount']) ? (int)round($ad['discount']) : 0;
            $total_price = isset($ad['price']) ? $ad['price'] : '';
            $discounted_total = $total_price - ($total_price * ($discount/100));
            $fav_params = "this,'".$ads_id."'";
            $images = json_decode($ad['image_url']);
            if($ad_type == 'ads') {
                $expire_date = isset($ad['expire_date']) ? $ad['expire_date'] : '';
            } else {
                $expire_date = isset($ad['deadline']) ? $ad['deadline'] : '';
            }
            $word_count = 50;

            $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', strip_tags($ad['description']));
            $string = str_replace("\n", " ", $string);
            $seemore = '<span class="text-bold">.....See More ! <span>';
            $array = explode(" ", $string);
            if (count($array)<= $word_count)
            {
                $retval =  $string;
            }
            else
            {
                array_splice($array, $word_count);
                $retval = implode(" ", $array).$seemore;
            }

            if ($expire_date >= $current_date) {
                $favorites_class = "";
                $favorites_title = "Ad as favorite";
                /*if(in_array($ads_id,$favorite_ads)){
                    $favorites_class = "favorite-active";
                    $favorites_title = "Remove From favorite";

                }*/
                if($ad['show_price']) {
                    if ($ad_type == 'ads') {
                        if ($ad['ad_condition']) {
                            $condition_block = '<div class="new-label new-top-right">New</div>';
                        }
                        if ($ad['discount']) {
                            $condition_block_price = '<span>&#2547; ' . $discounted_total . '</span>
															<del>&#2547; ' . $ad['price'] . '</del>';
                        } else {
                            $condition_block_price = '<span>&#2547; ' . $ad['price'] . '</span>';
                        }
                    } else {

                        $condition_block_price = '<span>&#2547; ' . $ad['price'] . '</span>';
                    }
                } else {
                    $condition_block_price = '';
                }
                $discount = "";
                if($ad['discount']){
                    $discount = '<div class="new-top-left""><strong style="font-weight: bold; margin-left: -14px">'.round($ad['discount']).'%Off</strong></div>';
                }

                $ad_id = $ads_id;
                $ad_views = Generic::getTotalAdView($ad_id);
                $view_count = array_sum(array_column($ad_views, 'view_count'));

                /*$favorite_counter = 0;
                $favorites = Favorites::model()->findAll();
                foreach ($favorites as $favorite) {
                    $ad_array = explode(',',$favorite->ad_id);
                    if(in_array($ad_id,$ad_array)) {
                        $favorite_counter++;
                    }
                }*/

                $opt_list = array(
                    'w' => '300',
                    'h' => '360',
                    'g' => 'center',
                    'r' => '0'
                );

                $package_info_details = '<div class="product-code">
                            <label>Service Charge/OTC: </label><span>'.Generic::renderServiceCharge($ad['service_charge']).'</span>
                        </div>';
                
                if(!empty($ad['migration_charge']) && $ad['migration_charge'] != 0){
                    $package_info_details .= '<div class="product-code">
                            <label>Migration Charge: </label>&#2547; <span>'.$ad['migration_charge'].'</span>
                        </div>';
                } else {
                    $package_info_details .= '<div class="product-code">
                            <label>Migration Charge: </label> Free</div>';
                }
                $package_info_details .= '<div class="product-code">
                                            <label>Package Type: </label> <span>'.ucwords($ad['package_type']).'</span>
                                        </div>';
                $package_info_details .= '<div class="product-code">
                                            <label>Internet Speed: </label> <span>'.$ad['internet_speed'].'</span>
                                        </div>';
                if($ad['public_ip']) {
                    $package_info_details .= '<div class="product-code">
                                            <label>Public IP: </label> <span>Yes</span>
                                        </div>';
                } else {
                    $package_info_details .= '<div class="product-code">
                                            <label>Public IP: </label> <span>No</span>
                                        </div>';
                }
                
                
                if($ad['youtube_speed'] != ''){
                    $package_info_details .= '<div class="product-code">
                                            <label>Youtube Speed: </label> <span>'.$ad['youtube_speed'].'</span>
                                        </div>';
                }
                if($ad['bdix_speed'] != '') {
                    $package_info_details .= '<div class="product-code">
                                            <label>BDIX Speed: </label> <span>'.$ad['bdix_speed'].'</span>
                                        </div>';
                }
                                         
                
                if($ad['ftp_link'] != ''){
                    $package_info_details .= '<div class="product-code">
                                            <label>FTP: </label> <span>Yes</span>
                                        </div>';
                }
                                
                if($ad['live_tv'] != ''){
                    $package_info_details .= '<div class="product-code">
                                            <label>Live TV: </label> <span>Yes</span>
                                        </div>';
                }                      
                if($ad['facebook_link'] != ''){
                $package_info_details .= '<div class="product-code">
                                            <label>Facebook Page: </label> <span><a href="http://'.$ad['facebook_link'].'" target="_blank">'.$ad['facebook_link'].'</a></span>
                                        </div>';
                }
                if($ad['website_link'] != '') {
                $package_info_details .= '<div class="product-code">
                                            <label>Website: </label> <span><a href="http://'.$ad['website_link'].'" target="_blank">'.$ad['website_link'].'</a></span>
                                        </div>';
                }

                $company_details = Estore::model()->findAllByAttributes(['user_id' => $ad['user_id']]);
                $registration_details = Register::model()->findAllByAttributes(['id' => $ad['user_id']]);
                $loaded_html_grid .= '<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="item-product">
                                                <div class="company_info">
                                                    <span><img src="'.$company_details[0]['logo'].'" alt="company logo" style="width:100px"></span>&nbsp;&nbsp;<span style="font-weight:bold">'.$registration_details[0]['enterprise_name'].'</span>
                                                </div>
												<div class="product-thumb">
													<a class="product-thumb-link" target="_blank" href="'.$ad_url.'">
														<img class="first-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
														<img class="second-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
													</a>
													<div class="product-info-cart">
														<div class="product-extra-link">
															<a href="javascript:void(0);" class="wishlist-link favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')"><i class="fa fa-heart-o"></i></a>
															<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
															<a href="javascript:void(0);" data-item="'.$ads_id.'" onclick="showAdPreviewModal('.$ads_id.')" class="quickview-link"><i class="fa fa-search"></i></a>
														</div>
														<a class="addcart-link" target="_blank" href="'.$ad_url.'"><i class="fa fa-eye"></i> View Details</a>
													</div>
												</div>
												<div class="product-info">
													<h3 class="title-product"><a target="_blank" href="'.$ad_url.'">'.$ad['title'].'</a></h3>
													<div class="info-price">
												'.$condition_block_price.'
													</div>
                                                    '.$package_info_details.'
												</div>
											</div>
										</li>';




                $loaded_html_list .= '<li>
                                           <div class="item-product">
												<div class="row">
													<div class="col-md-4 col-sm-12 col-xs-12">
                                                        <div class="company_info">
                                                            <span><img src="'.$company_details[0]['logo'].'" alt="company logo" style="width:100px"></span>&nbsp;&nbsp;<span style="font-weight:bold">'.$registration_details[0]['enterprise_name'].'</span>
                                                        </div>
														<div class="product-thumb">
															<a class="product-thumb-link" target="_blank" href="'.$ad_url.'">
																<img class="first-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
																<img class="second-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
															</a>
														</div>
													</div>
													<div class="col-md-8 col-sm-12 col-xs-12">
														<div class="product-info">
															<h3 class="title-product"><a target="_blank" href="'.$ad_url.'">'.$ad['title'].'</a><span class="verified-tag" style="font-size: 18px; padding-left: 8px; vertical-align: top; cursor: pointer;" title="Verified"><i class="fa fa-check" aria-hidden="true" style="padding: 0px; border-radius: 15px; background: green; color: #fff;"></i></span></h3>
															<div class="info-price">
																'.$condition_block_price.'
															</div>
                                                            '.$package_info_details.'
															<div class="product-stock">
																<span><i class="fa fa-map-marker" style="color: #0083c9;"></i> '. $ad['location'] .' </span> <i class="fa fa-heart" style="color: #0083c9;margin-left:10px"></i> <span class="favourite">  '.$favorite_counter.'</span>
															</div>


                                                                                    <div class="product-info-cart">
																<a class="addcart-link" target="_blank" href="'.$ad_url.'"><i class="fa fa-eye"></i>View Details</a>
																<div class="product-extra-link">
																	<a href="javascript:void(0);" class="wishlist-link favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')"><i class="fa fa-heart-o"></i></a>
															
															<a href="javascript:void(0);" data-item="'.$ads_id.'" onclick="showAdPreviewModal('.$ad['id'].')" class="quickview-link"><i class="fa fa-search"></i></a>
																</div>
															</div>
														</div>
														<p class="product-desc">'.$retval.'</p>
													</div>
												</div>
											</div>
										</li>';    }
        }
        if(!empty($ad_details))
        {
            $num_row_option_array = array(12,16,20);
            $option_block = '';
            foreach($num_row_option_array as $row){
                if($show==$row){
                    $option_block .= '<option value="'.$row.'"  selected="selected" >'.$row.'</option>';
                }else{
                    $option_block .= '<option value="'.$row.'"  >'.$row.'</option>';
                }

            }

            $loaded_html .='<table width="100%" border="0" cellspacing="0" cellpadding="2"  align="center">
                         <tr>
                            <td valign="top" align="left">
                            <label> Ads Per Page:
                             <select name="show" onChange="changeDisplayRowCount(this.value);">
                             '.$option_block.'
                       </select>
                       </label>
                        <td valign="top" align="center" >';

            $loaded_html .= " ";
            $cnt = ceil($cnt/$show);

            $loaded_html .= '<ul class="paginations">';

            $right_links = $page_num + 3;
            $previous = $page_num - 3; //previous link
            $next = $page_num + 1; //next link
            $first_link = true; //boolean var to decide our first link

            if ($page_num > 1) {
                $previous_link = ($previous == 0) ? 1 : $previous;
                $loaded_html .= '<li class="first"><a href="javascript:void(0);" data-page="1" onclick="changePage(' . $show . ', 1);" title="First">First Page</a></li>'; //first link
                $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $previous_link . '" onclick="changePage(' . $show . ', ' . ($page_num - 1) . ');" title="Previous">Previous</a></li>'; //previous link
                for ($i = ($page_num - 2); $i < $page_num; $i++) { //Create left-hand side links
                    if ($i > 0) {
                        $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $i . '" onclick="changePage(' . $show . ', ' . $i . ');" title="Page' . $i . '">' . $i . '</a></li>';
                    }
                }
                $first_link = false; //set first link to false
            }

            if ($first_link) { //if current active page is first link
                $loaded_html .= '<li class="first active">' . $page_num . '</li>';
            } elseif ($page_num == $cnt) { //if it's the last active link
                $loaded_html .= '<li class="last active">' . $page_num . '</li>';
            } else { //regular current link
                $loaded_html .= '<li class="active">' . $page_num . '</li>';
            }

            for ($i = $page_num + 1; $i < $right_links; $i++) { //create right-hand side links
                if ($i <= $cnt) {
                    $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $i . '" onclick="changePage(' . $show . ', ' . $i . ');" title="Page ' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($page_num < $cnt) {
                $next_link = ($i > $cnt) ? $cnt : $i;
                $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $next_link . '" onclick="changePage(' . $show . ', ' . ($page_num + 1) . ');" title="Next">Next</a></li>'; //next link
                $loaded_html .= '<li class="last"><a href="javascript:void(0);" data-page="' . $cnt . '" onclick="changePage(' . $show . ', ' . $last . ');" title="Last">Last Page</a></li>'; //last link
            }

            $loaded_html .= '</ul>';

            $loaded_html .='</td>
	         <td align="right" valign="top">
                 Page '.$page_num.' of '. $last.'
                </td>
               </tr>
              </table>';
        }


/*
        if(empty($ad_details)){
            $message = "Your search returned no available Ads. However Here are Some Suggestions For You..!";
            $loaded_htmls = '<div class="warning"><span style="text-align: justify;color: #000099">'.$message.'</span><br><br></div>';
            $user_ip = SiteConfig::GetUserIP();
            $user_ip = "180.234.143.72";
            $geoinfo = Generic::getGeoInfo($user_ip);
            $latitude = $geoinfo['geoplugin_latitude'];
            $longitude = $geoinfo['geoplugin_longitude'];
            $suggested_ads = Generic::getSuggestedAds($location);

            foreach ($suggested_ads as $ad) {
                $ad_url = Generic::getAdUrlFromAdId($ad['id']);
                $discount = isset($ad['discount']) ? round($ad['discount']) : '';
                $total_price = isset($ad['price']) ? $ad['price'] : '';
                $discounted_total = $total_price - ($total_price * ($discount/100));
                $fav_params = "this,'".$ad['id']."'";
                $images = json_decode($ad['image_url']);
                if($ad_type == 'ads') {
                    $expire_date = isset($ad['expire_date']) ? $ad['expire_date'] : '';
                } else {
                    $expire_date = isset($ad['deadline']) ? $ad['deadline'] : '';
                }
                $word_count = 50;

                $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $ad['description']);
                $string = str_replace("\n", " ", $string);
                $seemore = '<span class="text-bold">.....See More ! <span>';
                $array = explode(" ", $string);
                if (count($array)<= $word_count)
                {
                    $retval =  $string;
                }
                else
                {
                    array_splice($array, $word_count);
                    $retval = implode(" ", $array).$seemore;
                }


                    $favorites_class = "";
                    $favorites_title = "Ad as favorite";
                    if(in_array($ad['id'],$favorite_ads)){
                        $favorites_class = "favorite-active";
                        $favorites_title = "Remove From favorite";

                    }
                    if ($ad_type == 'ads') {
                        if ($ad['ad_condition']) {
                            $condition_block = '<div class="new-label new-top-right">New</div>';
                        }
                        if($ad['discount']){
                            $condition_block_price = '<span>&#2547; '.$discounted_total.'</span>
															<del>&#2547; '.$ad['price'].'</del>';
                        } else {
                            $condition_block_price = '<span>&#2547; '.$ad['price'].'</span>';
                        }
                    } else {

                        $condition_block_price = '<span>&#2547; '.$ad['price'].'</span>';
                    }
                    $discount = "";
                    if($ad['discount']){
                        $discount = '<div class="new-top-left""><strong style="font-weight: bold; margin-left: -14px">'.round($ad['discount']).'%Off</strong></div>';
                    }

                    $ad_id = $ad['id'];
                    $ad_views = Generic::getTotalAdView($ad_id);
                    $view_count = array_sum(array_column($ad_views, 'view_count'));

                    $favorite_counter = 0;
                    $favorites = Favorites::model()->findAll();
                    foreach ($favorites as $favorite) {
                        $ad_array = explode(',',$favorite->ad_id);
                        if(in_array($ad_id,$ad_array)) {
                            $favorite_counter++;
                        }
                    }
                    $loaded_html_list = '';
                    $loaded_html_grid = '';

                    $opt_list = array(
                        'w' => '300',
                        'h' => '360',
                        'g' => 'center',
                        'r' => '0'
                    );


                    $loaded_html_grid .= '<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
											<div class="item-product">
												<div class="product-thumb">
													<a class="product-thumb-link" target="_blank" href="<?=$ad_url?>">
														<img class="first-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
														<img class="second-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
													</a>
													<div class="product-info-cart">
														<div class="product-extra-link">
															<a href="javascript:void(0);" class="wishlist-link favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')"><i class="fa fa-heart-o"></i></a>
															<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
															<a href="javascript:void(0);" data-item="'.$ad['id'].'" onclick="showAdPreviewModal('.$ad['id'].')" class="quickview-link"><i class="fa fa-search"></i></a>
														</div>
														<a class="addcart-link" target="_blank" href="'.$ad_url.'"><i class="fa fa-eye"></i> View Details</a>
													</div>
												</div>
												<div class="product-info">
													<h3 class="title-product"><a target="_blank" href="'.$ad_url.'">'.$ad['title'].'</a></h3>
													<div class="info-price">
												'.$condition_block_price.'
													</div>

												</div>
											</div>
										</li>';




                    $loaded_html_list .= '<li>
                                           <div class="item-product">
												<div class="row">
													<div class="col-md-4 col-sm-12 col-xs-12">
														<div class="product-thumb">
															<a class="product-thumb-link" target="_blank" href="'.$ad_url.'">
																<img class="first-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
																<img class="second-thumb" alt="" src="'.ImageHelper::cloudinary($images[0], $opt_list).'">
															</a>
														</div>
													</div>
													<div class="col-md-8 col-sm-12 col-xs-12">
														<div class="product-info">
															<h3 class="title-product"><a target="_blank" href="'.$ad_url.'">'.$ad['title'].'</a><span class="verified-tag" style="font-size: 18px; padding-left: 8px; vertical-align: top; cursor: pointer;" title="Verified"><i class="fa fa-check" aria-hidden="true" style="padding: 0px; border-radius: 15px; background: green; color: #fff;"></i></span></h3>
															<div class="info-price">
																'.$condition_block_price.'
															</div>

															<div class="product-code">
																<label>Ad ID: </label> <span>#'.$ad['ad_id'].'</span>
															</div>
															<div class="product-stock">
																<label>Availability: </label> <span>In stock</span>
															</div>
															<div class="product-stock">
																<span><i class="fa fa-map-marker" style="color: #0083c9;"></i> '. $ad['location'] .' </span> <i class="fa fa-heart" style="color: #0083c9;margin-left:10px"></i> <span class="favourite">  '.$favorite_counter.'</span>
															</div>


                                                                                    <div class="product-info-cart">
																<a class="addcart-link" target="_blank" href="'.$ad_url.'"><i class="fa fa-eye"></i>View Details</a>
																<div class="product-extra-link">
																	<a href="javascript:void(0);" class="wishlist-link favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')"><i class="fa fa-heart-o"></i></a>
															<a href="javascript:void(0);" class="compare-link"><i class="fa fa-toggle-on"></i></a>
															<a href="javascript:void(0);" data-item="'.$ad['id'].'" onclick="showAdPreviewModal('.$ad['id'].')" class="quickview-link"><i class="fa fa-search"></i></a>
																</div>
															</div>
														</div>
														<p class="product-desc">'.$retval.'</p>
													</div>
												</div>
											</div>
										</li>';




            }
            $response['message'] = html_entity_decode($loaded_htmls);
            $response['list'] = html_entity_decode($loaded_html_list);
            $response['grid'] = html_entity_decode($loaded_html_grid);
            $response['ad_result_block'] = $ad_result_html;
            $response['personal'] = $business_type_personal;
            $response['business'] = $business_type_business;
            $response['promotion'] = $business_type_promotion;
            echo json_encode($response);
            return ;

        }*/
        if(empty($ad_details)){
            $message = "No Packages Found";
            $loaded_html = '<div class="warning">'.$message.'<br><br></div>';
        }

        $response['html'] = html_entity_decode($loaded_html);
        $response['list'] = html_entity_decode($loaded_html_list);
        $response['grid'] = html_entity_decode($loaded_html_grid);
        $response['ad_result_block'] = $ad_result_html;
        $response['personal'] = $business_type_personal;
        $response['business'] = $business_type_business;
        $response['promotion'] = $business_type_promotion;
        echo json_encode($response);
    }

    public function actionReturnMinMaxValue(){

        $ads = Yii::app()->request->getParam('ads','');
        $condition = Yii::app()->request->getParam('condition');

        $is_featured = Yii::app()->request->getParam('is_featured',false);
        $is_premium = Yii::app()->request->getParam('is_premium',false);
        $is_top = Yii::app()->request->getParam('is_top',false);
        $is_hot = Yii::app()->request->getParam('is_hot',false);
        switch($ads){
            case 'feature_ads':
                $is_featured = true;
                break;
            case 'premium_ads':
                $is_premium = true;
                break;
            case 'top_ads':
                $is_top = true;
                break;
            default:
                $is_hot = true;
                break;
        }

        $condition_array = array(
            'active'=> array(1)
        );

        if($condition && count($condition)<2) {
            $condition_array['ad_condition'] = $condition;
        }

        $min_max_price = Generic::getMinMaxPriceForAllAds(1,'tbl_ads',0,0,false,false,$condition_array,$is_featured,$is_premium,$is_hot,$is_top);
        $response['min_price'] = $min_max_price[0]['min_price'];
        $response['max_price'] = $min_max_price[0]['max_price'];
        echo json_encode($response);
    }

    public function actionListAllAdsUsingAjaxForShowAll(){
        $response = array();
        $table = 'tbl_ads';
        $ad_type = 'ads';
        $ads = Yii::app()->request->getParam('ads','');
        $page_num = Yii::app()->request->getParam('pagenum', '1');
        $show = Yii::app()->request->getParam('show','12');
        $view_type = Yii::app()->request->getParam('view','list');
        $location = Yii::app()->request->getParam('location','');
        $search_string = Yii::app()->request->getParam('search_string','');

        $minimum_price = Yii::app()->request->getParam('minimum_price',0);
        $maximum_price = Yii::app()->request->getParam('maximum_price',0);
        $condition = Yii::app()->request->getParam('condition');

        $is_featured = Yii::app()->request->getParam('is_featured',false);
        $is_premium = Yii::app()->request->getParam('is_premium',false);
        $is_top = Yii::app()->request->getParam('is_top',false);
        $is_hot = Yii::app()->request->getParam('is_hot',false);


        $condition_array = array(
            'active'=> array(1)
        );

        if($condition && count($condition)<2) {
            $condition_array['ad_condition'] = $condition;
        }

        if($ads == 'feature_ads'){
            $is_featured = true;
        } else if($ads == 'premium_ads'){
            $is_premium = true;
        } else if($ads == 'top_ads'){
            $is_top = true;
        }


        $ad_details = Generic::getAllAds(1,'tbl_ads',0,0,$minimum_price,$maximum_price,$condition_array,$is_featured,$is_premium,$is_hot,$is_top);
        $cnt = count($ad_details);

        $last = ceil($cnt / $show);
        if ($page_num < 1) {
            $page_num = 1;
        } elseif ($page_num > $last) {
            $page_num = $last;
        }

        $offset = ($page_num - 1) * $show;
        $ad_details = Generic::getAllAds(1,'tbl_ads',$show,$offset,$minimum_price,$maximum_price,$condition_array,$is_featured,$is_premium,$is_hot,$is_top);


        $ad_result_html = 'Result Showing '.count($ad_details).' of '.$cnt.' Ads';
        $current_date = date('Y-m-d');
        $baseUrl = Yii::app()->request->baseUrl;
        $opt = array(
            'w' => '320',
            'h' => '250',
            'c' => 'fill',
            'g' => 'center',
            'r' => '0'
        );
        $loaded_html = '';
        $condition_block = '';
        $condition_block_price = '';

        $list_view ="display: block" ;
        $grid_view = "display: block";
        if($view_type == 'list'){

            $grid_view = "display: none";
        }else{

            $list_view ="display: none" ;

        }
        $favorite_ads = Generic::getAllFavoritesAds();
        foreach ($ad_details as $ad) {
            $ad_url = Generic::getAdUrlFromAdId($ad['id']);
            $discount = isset($ad['discount']) ? round($ad['discount']) : '';
            $total_price = isset($ad['price']) ? $ad['price'] : '';
            $discounted_total = $total_price - ($total_price * ($discount/100));
            $fav_params = "this,'".$ad['id']."'";
            $images = json_decode($ad['image_url']);
            if($ad_type == 'ads') {
                $expire_date = isset($ad['expire_date']) ? $ad['expire_date'] : '';
            } else {
                $expire_date = isset($ad['deadline']) ? $ad['deadline'] : '';
            }
            $word_count = 50;

            $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $ad['description']);
            $string = str_replace("\n", " ", $string);
            $seemore = '<span class="text-bold">.....See More ! <span>';
            $array = explode(" ", $string);
            if (count($array)<= $word_count)
            {
                $retval =  $string;
            }
            else
            {
                array_splice($array, $word_count);
                $retval = implode(" ", $array).$seemore;
            }

            if ($expire_date >= $current_date) {
                $favorites_class = "";
                $favorites_title = "Ad as favorite";
                if(in_array($ad['id'],$favorite_ads)){
                    $favorites_class = "favorite-active";
                    $favorites_title = "Remove From favorite";

                }
                if ($ad_type == 'ads') {
                    if ($ad['ad_condition']) {
                        if($ads == 'feature_ads') {
                            $condition_block = '<div class="new-label new-top-right" style="background-color: #167bcb">FEATURED</div>';
                        }
                        if($ads == 'premium_ads') {
                            $condition_block = '<div class="new-label new-top-right" style="background-color: #4bae4f">PREMIUM</div>';
                        }
                        if($ads == 'top_ads') {
                            $condition_block = '<div class="new-label new-top-right">TOP</div>';
                        }
                    }
                    if($ad['discount']){
                    $condition_block_price = '<div class="item-price">
                                                    <div class="price-box"><span class="regular-price">
                                                    <span class="price">BDT ' . $discounted_total.'</span> </span>&nbsp;&nbsp;
                                                    <span
                                                                    class="" style="color:red;text-decoration:line-through"> <span
                                                                    class="price" style="color:black; font-weight: 500; font-size: 13px;">BDT '. $ad['price'] .'</span> </span>
                                                    </div>
                                                         </div>';
                    } else {
                        $condition_block_price = '<div class="item-price">
											<div class="price-box">
												<p class="regular-price"><span class="price-label"></span> <span class="price"> BDT ' . round($ad['price'], 2) . '</span> </p>
											</div>
										</div>';
                    }
                } else {

                    $condition_block_price = '<div class="item-price">
											<div class="price-box">
												<p class="special-price"><span class="price-label">Salary</span> <span class="price"> BDT ' . $ad['salary'] . '</span> </p>
											</div>
										</div>';
                }
                $discount = "";
                if($ad['discount']){
                    $discount = '<div class="new-top-left""><strong style="font-weight: bold; margin-left: -14px">'.round($ad['discount']).'%Off</strong></div>';
                }

                $ad_id = $ad['id'];
                $ad_views = Generic::getTotalAdView($ad_id);
                $view_count = array_sum(array_column($ad_views, 'view_count'));

                $favorite_counter = 0;
                $favorites = Favorites::model()->findAll();
                foreach ($favorites as $favorite) {
                    $ad_array = explode(',',$favorite->ad_id);
                    if(in_array($ad_id,$ad_array)) {
                        $favorite_counter++;
                    }
                }

                $loaded_html .= '<ul class="products-grid" style="'.$grid_view.'">
	                     <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
						<div class="item-inner">
							<div class="item-img">
								<div class="item-img-info"><a target="_blank" href="' . $ad_url . '" title="' . $ad['title'] . '" class="product-image"><img src="' . ImageHelper::cloudinary($images[0], $opt) . '" alt="Retis lapen casen"></a>
									' . $condition_block . '
									'.$discount.'
									<div class="box-hover">
										<ul class="add-to-links">
											<li><a class="link-quickview" href="javascript:void(0);" onclick="showAdPreviewModal('.$ad['id'].')">Quick View</a> </li>
											<li><a class="link-wishlist favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')">Wishlist</a> </li>
											<li><a class="link-compare" href="javascript:void(0);">Compare</a> </li>
										</ul>
									</div>
								</div>
							</div>
							<div class="item-info">
								<div class="info-inner">
									<div class="item-title"> <a target="_blank" title="' . $ad['title'] . '" href="' . $ad_url . '">' . $ad['title'] . '</a> </div>
									<div class="item-content">
										' . $condition_block_price . '
										<div class="action">
											<a href="' . $ad_url . '" target="_blank"><button class="button btn-cart" type="button" title="" data-original-title="View Details" ><span>View Details</span></button></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>

                      </ul>
                    <ol class="products-list" id="products-list" style="'.$list_view.'">
                 	<li class="item">
			       	<div class="product-image"> <a target="_blank" href="' . $ad_url . '" title="' . $ad['title'] . '"> <img class="small-image" src="' . ImageHelper::cloudinary($images[0], $opt) . '" alt="' . $ad['title'] . '"> </a>
			       	' . $condition_block . '
									'.$discount.'
									<div class="box-hover">
										<ul class="add-to-links">
											<li><a class="link-quickview" href="javascript:void(0);" onclick="showAdPreviewModal('.$ad['id'].')">Quick View</a> </li>
											<li><a class="link-wishlist favorite '.$favorites_class.'" title="'.$favorites_title.'"  href="javascript:void(0);" onclick="ChangeFavoriteStatus('.$fav_params.')">Wishlist</a> </li>
											<li><a class="link-compare" href="javascript:void(0);">Compare</a> </li>
										</ul>
									</div>
									</div>
				    <div class="product-shop">
					<h2 class="product-name"><a target="_blank" href="' . $ad_url . '" title="' . $ad['title'] . '">' . $ad['title'] . '</a><span class="verified-tag" style="font-size: 18px; padding-left: 8px; vertical-align: top; cursor: pointer;" title="Verified"><i class="fa fa-check" aria-hidden="true" style="padding: 0px; border-radius: 15px; background: green; color: #fff;"></i></span></h2>
					<div class="ratings">
						<div class="rating-box">
							<div style="width:50%" class="rating"></div>
						</div>
						<p class="rating-links"><i class="fa fa-eye" style="color: #0083c9; margin-left: -60px"></i> '.$view_count.' </p>
						<p class="rating-links"><i class="fa fa-heart" style="color: #0083c9"></i> '.$favorite_counter.' </p>
						<p class="location"> <i class="fa fa-map-marker" style="color: #0083c9; margin-left: 34px"></i><b> '. $ad['location'] .'</b></span> </p>
					</div>
					<div class="desc std">
						<p>' . $retval . '</p>
					</div>
				' . $condition_block_price . '
					<div class="actions">
						<a href="' . $ad_url . '" target="_blank"><button class="button " title="View Details" type="button" ><span>View Details</span></button></a>
					</div>
				</div>
			</li>

</ol>';
            }
        }
        if($ad_details){ $num_row_option_array = array(12,16,20);
            $option_block = '';
            foreach($num_row_option_array as $row){
                if($show==$row){
                    $option_block .= '<option value="'.$row.'"  selected="selected" >'.$row.'</option>';
                }else{
                    $option_block .= '<option value="'.$row.'"  >'.$row.'</option>';
                }

            }

            $loaded_html .='<table width="50%" border="0" cellspacing="0" cellpadding="2"  align="center">
                         <tr>
                            <td valign="top" align="left">
                            <label> Ads Per Page:
                             <select name="show" onChange="changeDisplayRowCount(this.value);">
                             '.$option_block.'
                       </select>
                       </label>
                        <td valign="top" align="center" >';


            $loaded_html .= " ";
            $cnt = ceil($cnt/$show);

            $loaded_html .= '<ul class="paginations">';

            $right_links = $page_num + 3;
            $previous = $page_num - 3; //previous link
            $next = $page_num + 1; //next link
            $first_link = true; //boolean var to decide our first link

            if ($page_num > 1) {
                $previous_link = ($previous == 0) ? 1 : $previous;
                $loaded_html .= '<li class="first"><a href="javascript:void(0);" data-page="1" onclick="changePage(' . $show . ', 1);" title="First">First Page</a></li>'; //first link
                $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $previous_link . '" onclick="changePage(' . $show . ', ' . ($page_num - 1) . ');" title="Previous">Previous</a></li>'; //previous link
                for ($i = ($page_num - 2); $i < $page_num; $i++) { //Create left-hand side links
                    if ($i > 0) {
                        $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $i . '" onclick="changePage(' . $show . ', ' . $i . ');" title="Page' . $i . '">' . $i . '</a></li>';
                    }
                }
                $first_link = false; //set first link to false
            }

            if ($first_link) { //if current active page is first link
                $loaded_html .= '<li class="first active">' . $page_num . '</li>';
            } elseif ($page_num == $cnt) { //if it's the last active link
                $loaded_html .= '<li class="last active">' . $page_num . '</li>';
            } else { //regular current link
                $loaded_html .= '<li class="active">' . $page_num . '</li>';
            }

            for ($i = $page_num + 1; $i < $right_links; $i++) { //create right-hand side links
                if ($i <= $cnt) {
                    $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $i . '" onclick="changePage(' . $show . ', ' . $i . ');" title="Page ' . $i . '">' . $i . '</a></li>';
                }
            }
            if ($page_num < $cnt) {
                $next_link = ($i > $cnt) ? $cnt : $i;
                $loaded_html .= '<li><a href="javascript:void(0);" data-page="' . $next_link . '" onclick="changePage(' . $show . ', ' . ($page_num + 1) . ');" title="Next">Next</a></li>'; //next link
                $loaded_html .= '<li class="last"><a href="javascript:void(0);" data-page="' . $cnt . '" onclick="changePage(' . $show . ', ' . $last . ');" title="Last">Last Page</a></li>'; //last link
            }

            $loaded_html .= '</ul>';
            $loaded_html .='</td>
	         <td align="right" valign="top">
                 Page '.$page_num.' of '. $last.'
                </td>
               </tr>
              </table>';}


        $response['html'] = html_entity_decode($loaded_html);
        $response['ad_result_block'] = $ad_result_html;
        echo json_encode($response);
    }



}
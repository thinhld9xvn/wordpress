<?php 

    namespace Theme_Options;

    class SLIDER_FIELDS {

        //slider section
        const SLIDER_SECTION_ID = 'section-slider';
        const SLIDER_SECTION_TITLE = 'Slider';
        const SLIDER_SECTION_DESCRIPTION = 'All slider settings';

        const SLIDER_SECTION_1_ID = 'slider-section-1';
        const SLIDER_SECTION_1_TYPE = 'section';
        const SLIDER_SECTION_1_TITLE = 'Slider settings';
        const SLIDER_SECTION_1_DESC = '';
        const SLIDER_SECTION_1_INDENT = true;            

        const SLIDER_SECTION_POST_TYPE_ID = 'slider-post-type';
        const SLIDER_SECTION_POST_TYPE_TYPE = 'select';
        const SLIDER_SECTION_POST_TYPE_DATA = 'post_type';
        const SLIDER_SECTION_POST_TYPE_TITLE = 'Slider post type';
        const SLIDER_SECTION_POST_TYPE_DESCRIPTION = 'Please choose a post type';   
        
        const SLIDER_SECTION_PAUSE_SETTING_ID = 'slider-pause-setting';
        const SLIDER_SECTION_PAUSE_SETTING_TYPE = 'range';
        const SLIDER_SECTION_PAUSE_SETTING_MIN = '4000';
        const SLIDER_SECTION_PAUSE_SETTING_MAX = '20000';
        const SLIDER_SECTION_PAUSE_SETTING_STEP = '1000';
        const SLIDER_SECTION_PAUSE_SETTING_VALUE = '10000';
        const SLIDER_SECTION_PAUSE_SETTING_TITLE = 'Pause setting';
        const SLIDER_SECTION_PAUSE_SETTING_DESCRIPTION = 'Please choose a pause setting';   

        const SLIDER_SECTION_2_ID = 'slider-section-2';
        const SLIDER_SECTION_2_TYPE = 'section'; 
        const SLIDER_SECTION_2_INDENT = false; 

    }
<?php    

    class ProfileForm {

        private $options;
        private static $instance;

        public static function get_instance() {            

            if ( ! self::$instance instanceof Profileform ) :

                self::$instance = new ProfileForm;                

            endif;

            return self::$instance;

        }        

        public function __construct() {

            $this->options = get_option('section-profile-form_option_name');
            
        }

        public function get_field_avatar_error_msg() {
            
            return $this->options['profileform-avatar-required-msg-id'];

        }

        public function get_field_bg_cover_error_msg() {
            
            return $this->options['profileform-bg-cover-required-msg-id'];

        }

        public function print_field_avatar_error_msg() {

            echo $this->get_field_avatar_error_msg();

        }

        public function get_field_job_description_error_msg() {
            
            return $this->options['profileform-job-description-required-msg-id'];

        }

        public function print_field_job_description_error_msg() {

            echo get_field_job_description_error_msg();

        }

        public function get_field_company_logo_error_msg() {
           
            return $this->options['profileform-company-logo-required-msg-id'];

        }

        public function print_field_company_logo_error_msg() {

            echo get_field_company_logo_error_msg();

        }

        public function get_field_job_category_error_msg() {
            
            return $this->options['profileform-job-category-required-msg-id'];

        }

        public function print_field_job_category_error_msg() {

            echo get_field_job_category_error_msg();

        }

        public function get_field_job_salary_error_msg() {
            
            return $this->options['profileform-job-salary-required-msg-id'];

        }

        public function print_field_job_salary_error_msg() {

            echo get_field_job_salary_error_msg();

        }

        public function get_field_job_qualification_error_msg() {
            
            return $this->options['profileform-job-qualification-required-msg-id'];

        }

        public function print_field_job_qualification_error_msg() {

            echo get_field_job_qualification_error_msg();

        }

        public function get_field_job_vacancy_type_error_msg() {
            
            return $this->options['profileform-job-vacancy-type-required-msg-id'];

        }

        public function print_field_job_vacancy_type_error_msg() {

            echo get_field_job_vacancy_type_error_msg();

        }        

        public function get_field_region_error_msg() {
            
            return $this->options['profileform-region-required-msg-id'];

        }

        public function get_field_account_type_error_msg() {
            
            return $this->options['profileform-account-type-required-msg-id'];

        }

        public function get_field_language_error_msg() {
            
            return $this->options['profileform-language-required-msg-id'];

        }

        public function get_field_category_of_service_error_msg() {
            
            return $this->options['profileform-category-of-service-required-msg-id'];

        }

        public function print_field_region_error_msg() {

            echo get_field_region_error_msg();

        }        

    }    
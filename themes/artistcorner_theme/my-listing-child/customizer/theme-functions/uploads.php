<?php
    function get_max_upload_sizes() {
        return wp_max_upload_size() / (1024 * 1024);
    }
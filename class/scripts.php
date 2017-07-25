<?php

class Hrm_Scripts {
	private static $_instance;

    public static function getInstance() {
        if ( !self::$_instance ) {
            self::$_instance = new Hrm_Admin();
        }

        return self::$_instance;
    }

    public static function get_sub_tab() {
    	$query_args = hrm_get_query_args();

		$tab     = $query_args['tab'];
		$sub_tab = $query_args['subtab'] ? $query_args['subtab'] : $tab;

		return $sub_tab;
    }

    public static function admin() {
    	$sub_tab = self::get_sub_tab();

		switch ( $sub_tab ) {
			case 'department':
				self::department();
				break;
			
			default:
				self::admin_default();
				break;
		}
    }

    public static function admin_localize($key) {
        wp_localize_script( $key, 'HRM_Admin', array(
            'ajax_url'    => admin_url( 'admin-ajax.php' ),
            'nonce'       => wp_create_nonce( 'hrm_nonce' ),
            'message'     => hrm_message(),
            'confirm_msg' => __( 'Are you sure!', 'hrm'),
            'success_msg' => __( 'Changed Successfully', 'hrm' )
        ));
    }

    public static function department() {
    	wp_enqueue_script( 'hrm-vue' );
        wp_enqueue_script( 'hrm-vuex' );
        wp_enqueue_script( 'hrm-vue-router' );
        self::admin_localize( 'hrm-vue' );
        wp_enqueue_script( 'hrm-common-mixin' );
        
        wp_enqueue_script( 'hrm-department-edit-btn', HRM_URL . '/asset/js/components/department/department-edit-btn.js', array(), false, true);
        wp_enqueue_script( 'hrm-department-add-btn', HRM_URL . '/asset/js/components/department/department-add-btn.js', array(), false, true);
        wp_enqueue_script( 'hrm-department-del-btn', HRM_URL . '/asset/js/components/department/department-del-btn.js', array(), false, true);
        wp_enqueue_script( 'hrm-department-search', HRM_URL . '/asset/js/components/department/department-search.js', array(), false, true);
        wp_enqueue_script( 'hrm-department-paginate-drop-dwon', HRM_URL . '/asset/js/components/department/department-paginate-drop-down.js', array(), false, true);
        wp_enqueue_script( 'hrm-department-table', HRM_URL . '/asset/js/components/department/department-table.js', array(), false, true);
        wp_enqueue_script( 'hrm-department-pagination', HRM_URL . '/asset/js/components/department/department-pagination.js', array(), false, true);
        wp_enqueue_script( 'hrm-new-department-form', HRM_URL . '/asset/js/components/department/new-department-form.js', array(), false, true);
        
        wp_enqueue_script( 'hrm-admin-vue-store' );
        wp_enqueue_script( 'hrm-admin-vue' );
        wp_enqueue_style( 'hrm-admin', HRM_URL . '/asset/css/admin.css', false, false, 'all' );
    }

    public static function admin_default() {
    	global $hrm_is_admin;

    	wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-ui-dialog' );
        wp_enqueue_script( 'jquery-ui-autocomplete');
        wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_script( 'jquery-ui-slider' );
        wp_enqueue_script( 'hrm_chosen', HRM_URL . '/asset/js/chosen.jquery.min.js', array( 'jquery' ), false, true);
        wp_enqueue_script( 'hrm_datetimepicker', HRM_URL . '/asset/js/jquery-ui-timepicker.js', array( 'jquery' ), false, true);
        wp_enqueue_script( 'hrm-jquery.dataTables', HRM_URL . '/asset/js/jquery.dataTables.min.js', array( 'jquery' ), false, true);
        wp_enqueue_script( 'hrm_admin', HRM_URL . '/asset/js/hrm.js', array( 'jquery' ), false, true);

        wp_localize_script( 'hrm_admin', 'hrm_ajax_data', array(
            'ajax_url'    => admin_url( 'admin-ajax.php' ),
            '_wpnonce'    => wp_create_nonce( 'hrm_nonce' ),
            'is_admin'    => $hrm_is_admin,
            'message'     => hrm_message(),
            'confirm_msg' => __( 'Are you sure!', 'hrm'),
            'success_msg' => __( 'Changed Successfully', 'hrm' )
        ));

        //wp_enqueue_style( 'hrm-jquery.dataTables-style', HRM_URL . '/asset/css/jquery.dataTables.css', false, false, 'all' );
        //wp_enqueue_style( 'hrm-jquery.dataTables_themeroller', HRM_URL . '/asset/css/jquery.dataTables_themeroller.css', false, false, 'all' );
        wp_enqueue_style( 'hrm-admin', HRM_URL . '/asset/css/admin.css', false, false, 'all' );
        wp_enqueue_style( 'hrm-chosen', HRM_URL . '/asset/css/chosen.min.css', false, false, 'all' );
        wp_enqueue_style( 'hrm-jquery-ui', HRM_URL . '/asset/css/jquery-ui.css', false, false, 'all' );
        wp_enqueue_style( 'hrm-jquery-ui-timepicker', HRM_URL . '/asset/css/jquery-ui-timepicker-addon.css', false, false, 'all' );
    }

    /**
     * Attendance scripts
     * 
     * @return void
     */
    public static function attendance_scripts() {
        wp_enqueue_script( 'hrm-vue' );
        wp_enqueue_script( 'hrm-vuex' );
        wp_enqueue_script( 'hrm-vue-router' );
        self::admin_localize( 'hrm-vue' );
        wp_enqueue_script( 'hrm-common-mixin' );
        
        wp_enqueue_script( 'hrm-attendance-punch-in-out-btn', HRM_URL . '/asset/js/components/attendance/attendance-punch-in-out-btn.js', array(), false, true);

        
        wp_enqueue_script( 'hrm-attendance-vue-store', HRM_URL . '/asset/js/attendance/attendance-vue-store.js', array(), false, true );
        wp_enqueue_script( 'hrm-attendance-vue', HRM_URL . '/asset/js/attendance/attendance-vue.js', array(), false, true );

        wp_enqueue_style( 'hrm-admin', HRM_URL . '/asset/css/admin.css', false, false, 'all' );
    }
}




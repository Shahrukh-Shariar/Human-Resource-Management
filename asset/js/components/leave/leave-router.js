HRM_Router.routes.push(
	{ 
    	path: '/leave', 
    	components: { 'hrm-leave-records': Hrm_Leave_Records }, 
    	name: 'leave_records',

	}

);

HRM_Router.routes.push(
    {
        path: '/leave-configuration', 
        components: { 'hrm-leave-configuration': Hrm_Leave_Configuration }, 
        name: 'leave_configuration',

        children: [
            {
                path: '/leave-configuration/type', 
                components: { 'hrm-leave-type': Hrm_Leave_Type }, 
                name: 'leave_type',
            },

            {
                path: '/leave-configuration/week', 
                components: { 'hrm-leave-work-week': Hrm_Leave_Work_Week }, 
                name: 'leave_week',
            },

            {
                path: '/leave-configuration/holidays', 
                components: { 'hrm-leave-holidays': Hrm_Leave_Holidays }, 
                name: 'leave_holidays',
            }
        ]
    }
);
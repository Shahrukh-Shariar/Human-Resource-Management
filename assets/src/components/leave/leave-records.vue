<template>
	<div class="wrap hrm-leave">
		<h1 class="wp-heading-inline">Leaves</h1>
		<a @click.prevent="showHideLeaveRecordsForm('toggle')" href="#" class="page-title-action hrm-btn">
			Add New
		</a>
		
		<leave-header></leave-header>
		
		<hrm-leave-records-form class="hrm-toggle" v-if="is_leave_form_active"></hrm-leave-records-form>
		
		<!-- <div v-employee-leave-records class="hrm-employee-leave-records"></div> -->
		<hrm-leave-records-render></hrm-leave-records-render>
	</div>
</template>


<script>
import header from './leave-header.vue';
import leave_record_add_btn from './leave-records-add-btn.vue';
import leave_records_form from './leave-records-form.vue';
import leave_records_render from './leave-records-render.vue';
import Mixin from './mixin'



export default {
	mixins: [Mixin],
	
	computed: {
		is_leave_form_active: function() {
			return this.$store.state.leave.is_leave_form_active;
		}
	},
	components: {
		'leave-header': header,
		'hrm-leave-records-add-btn': leave_record_add_btn,
		'hrm-leave-records-form': leave_records_form,
		'hrm-leave-records-render': leave_records_render
	},
}

</script>

<style>
	.hrm-employee-leave-records {
		width: 50%;
	}
</style>





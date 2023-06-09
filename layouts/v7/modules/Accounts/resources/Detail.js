/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

Vtiger_Detail_Js("Accounts_Detail_Js",{
	//It stores the Account Hierarchy response data
	accountHierarchyResponseCache : {},

	/*
	 * function to trigger Account Hierarchy action
	 * @param: Account Hierarchy Url.
	 */
	triggerAccountHierarchy : function(accountHierarchyUrl) {
		Accounts_Detail_Js.getAccountHierarchyResponseData(accountHierarchyUrl).then(
			function(data) {
				Accounts_Detail_Js.displayAccountHierarchyResponseData(data);
			}
		);

	},

	/*
	 * function to get the AccountHierarchy response data
	 */
	getAccountHierarchyResponseData : function(url) {
		var aDeferred = jQuery.Deferred();

		//Check in the cache
		if(!(jQuery.isEmptyObject(Accounts_Detail_Js.accountHierarchyResponseCache))) {
			aDeferred.resolve(Accounts_Detail_Js.accountHierarchyResponseCache);
		} else {
			app.request.get({"url":url}).then(
				function(err,data) {
					//store it in the cache, so that we dont do multiple request
					Accounts_Detail_Js.accountHierarchyResponseCache = data;
					aDeferred.resolve(Accounts_Detail_Js.accountHierarchyResponseCache);
				}
			);
		}
		return aDeferred.promise();
	},

	/*
	 * function to display the AccountHierarchy response data
	 */
	displayAccountHierarchyResponseData : function(data) {
		var callbackFunction = function(data) {
			if(jQuery('#hierarchyScroll').height() > 300){
				app.helper.showVerticalScroll(jQuery('#hierarchyScroll'), {
					setHeight: '300px',
					autoHideScrollbar: false,
				});
			}

			// Added by Phu Vo on 2019.06.20 to trigger post showmodal event
			app.event.trigger('post.accountHierarchyPopup.load', data);
			// End Phu Vo
		}
		app.helper.showModal(data,{"cb":callbackFunction});
	}
},{
	/**
	 * To handle related record delete confirmation message
	 */
	getDeleteMessageKey : function() {
		return 'LBL_RELATED_RECORD_DELETE_CONFIRMATION';
	},

	/**
	 * Function to register event for adding related record for module
	 */
	registerEventForAddingRelatedRecord : function(){
		var thisInstance = this;
		var detailViewContainer = thisInstance.getDetailViewContainer();
		detailViewContainer.on('click','[name="addButton"]',function(e){
			var element = jQuery(e.currentTarget);
			var relatedModuleName = element.attr('module');
			var quickCreateNode = jQuery('#quickCreateModules').find('[data-name="'+ relatedModuleName +'"]');
			if(quickCreateNode.length <= 0) {
				window.location.href = element.data('url');
				return;
			}

			var relatedController = thisInstance.getRelatedController(relatedModuleName);

			// [Calendar] Modified by Phu Vo on 2020.12.03 to change popup behavior
			const callback = () => {
				const form = $('#QuickCreate');
				
				if (relatedModuleName === 'Events') {
					form.find('[name="activitytype"]').attr('readonly', true);
					const parentId = form.find('.fieldValue.parent_id').find('[name="parent_id"]');
					
					if (parentId.val()) {
						const data = {
							[parentId.val()]: {
								id: parentId.val(),
								text: parentId.data()['displayvalue'],
								info: null,
							},
						};

						parentId.trigger('Vtiger.PostReference.Selection', data);
					}
				}
			}

			var postPopupViewController = function() {
				var instance = new Contacts_Edit_Js();
				var data = new Object;
				var container = jQuery("[name='QuickCreate']");
				data.source_module = app.getModuleName();
				data.record = thisInstance.getRecordId();
				data.selectedName = container.find("[name='account_id_display']").val();
				instance.referenceSelectionEventHandler(data,container);
				callback();
			}

			if (relatedModuleName == 'Contacts') {
				relatedController.addRelatedRecord(element , postPopupViewController);
			}
			else {
				relatedController.addRelatedRecord(element, callback);
			}
			// End Phu Vo
		})
	},

});
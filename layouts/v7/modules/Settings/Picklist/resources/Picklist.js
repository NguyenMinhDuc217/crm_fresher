/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
var Settings_Picklist_Js = {

    getContainer : function() {
        return jQuery('#listViewContent');
    },
    
	registerModuleChangeEvent : function() {
		jQuery('#pickListModules').on('change',function(e){
            var selectedModule = jQuery(e.currentTarget).val();
            if(selectedModule.length <= 0) {
                app.helper.showErrorNotification({message: app.vtranslate('JS_PLEASE_SELECT_MODULE')});
                return;
            }
			var params = {
				module : app.getModuleName(),
				parent : app.getParentModuleName(),
				source_module : selectedModule,
				view : 'IndexAjax',
				mode : 'getPickListDetailsForModule'
			}
            app.helper.showProgress();
			app.request.post({data: params}).then(function(error, data){
				jQuery('#modulePickListContainer').html(data);
				app.helper.hideProgress();
				vtUtils.showSelect2ElementView(jQuery('#modulePickListContainer').find('select.select2'));
				Settings_Picklist_Js.registerModulePickListChangeEvent();
				jQuery('#modulePickList').trigger('change');
			});
		});
	},

	registerModulePickListChangeEvent : function() {
		jQuery('#modulePickList').on('change',function(e){
			var params = {
				module : app.getModuleName(),
				parent : app.getParentModuleName(),
				source_module : jQuery('#pickListModules').val(),
				view : 'IndexAjax',
				mode : 'getPickListValueForField',
				pickListFieldId : jQuery(e.currentTarget).val()
			}
			app.helper.showProgress();
			app.request.post({data: params}).then(function(error, data){
				jQuery('#modulePickListValuesContainer').html(data);
				vtUtils.showSelect2ElementView(jQuery('#rolesList'));
				Settings_Picklist_Js.registerItemActions();
				app.helper.hideProgress();
			})
		})
	},

	registerAddItemEvent : function() {
		var popupShown = false;
		jQuery('#addItem').on('click',function(e){
			var data = jQuery('#createViewContents').find('.modalContents');
			var clonedCreateView = data.clone(true,true).removeClass('basicCreateView').addClass('createView');
			clonedCreateView.find('.rolesList').addClass('select2');
			if(popupShown) {
				return false;
			}
            
			var callBackFunction = function(data) {
				popupShown = false;

                // Commented out by Hieu Nguyen on 2019-05-29 to skip binding select2 for item value field
                /*var select2params = {tags : [], tokenSeparators: [","]};
                vtUtils.showSelect2ElementView(data.find('[name=newValue]'), select2params);*/
                // End Hieu Nguyen
                
                Settings_Picklist_Js.registerColorPickerEvent(data);
				Settings_Picklist_Js.registerAddItemSaveEvent(data);
				Settings_Picklist_Js.regiserSelectRolesEvent(data);

                // Added by Hieu Nguyen on 2019-05-29
				Settings_Picklist_Js.registerItemValueChangeEvent(data);
                // End Hieu Nguyen
			}   
			popupShown = true;
			app.helper.showModal(clonedCreateView.html(), {cb: callBackFunction});
		});
	},

	registerenableOrDisableListSaveEvent : function() {
		jQuery('#saveOrder').on('click',function(e) {
			app.helper.showProgress();
			var pickListValues = jQuery('#role2picklist option');
            var selectedValues = jQuery('#role2picklist').val();
			var disabledValues = [];
			var enabledValues = [];
			jQuery.each(pickListValues,function() {
				var currentValue = jQuery(this);
				if(selectedValues && jQuery.inArray(currentValue.val(), selectedValues) > -1){
					enabledValues.push(currentValue.data('id'));
				} else {
					disabledValues.push(currentValue.data('id'));
				}
			});
			var params = {
				module : app.getModuleName(),
				parent : app.getParentModuleName(),
				action : 'SaveAjax',
				mode : 'enableOrDisable',
				enabled_values : enabledValues,
				disabled_values : disabledValues,
				picklistName : jQuery('[name="picklistName"]').val(),
				rolesSelected : jQuery('#rolesList').val()
			}
			app.request.post({data: params}).then(function(error, data) {
				if(data) {
					app.helper.hideProgress();
                    app.helper.showSuccessNotification({message: app.vtranslate('JS_LIST_UPDATED_SUCCESSFULLY')});
				}
			});
		});
	},

	regiserSelectRolesEvent : function(data) {
		data.find('[name="rolesSelected[]"]').on('change',function(e) {
			var rolesSelectElement = jQuery(e.currentTarget);
			var selectedValue = rolesSelectElement.val();
			if(jQuery.inArray('all', selectedValue) != -1){
				rolesSelectElement.select2("val", "");
				rolesSelectElement.select2("val","all");
				rolesSelectElement.select2("close");
				rolesSelectElement.find('option').not(':first').attr('disabled','disabled');
                if(jQuery('.allRoleSelected').length < 1)
                    data.find(jQuery('.modal-body')).append('<div class="alert alert-info textAlignCenter allRoleSelected">'+app.vtranslate('JS_ALL_ROLES_SELECTED')+'</div>')
			} else {
				rolesSelectElement.find('option').removeAttr('disabled','disabled');
				data.find('.modal-body').find('.alert').remove();
			}
		});
	},

	registerRenameItemEvent : function() {
		var thisInstance = this;
        var container = this.getContainer();
		var popupShown = false;
		container.on('click', '.renameItem', function(e){
			if(popupShown) {
				return false;
			}

            // Added by Hieu Nguyen on 2019-05-29
            app.helper.showProgress();
            // End Hieu Nguyen

			var selectedListItem = jQuery(e.currentTarget);
            var params = {
                module : app.getModuleName(),
                parent : app.getParentModuleName(),
                source_module : jQuery('#pickListModules').val(),
                view : 'IndexAjax',
                mode : 'showEditView',
                pickListFieldId : jQuery('#modulePickList').val(),
                fieldValue	: selectedListItem.closest('tr').data('key'),
                fieldValueId : selectedListItem.closest('tr').data('key-id')
            }
			popupShown = true;
            app.request.post({data: params}).then(function(error, data){
                app.helper.showModal(data, {cb: function(){
					popupShown = false;
				}});
                var form = jQuery('#renameItemForm');
                Settings_Picklist_Js.registerColorPickerEvent(form);
                thisInstance.registerScrollForNonEditablePicklistValues(form);
                Settings_Picklist_Js.registerRenameItemSaveEvent();

                // Added by Hieu Nguyen on 2019-05-29
                app.helper.hideProgress();
                Settings_Picklist_Js.registerItemValueChangeEvent(form);
                // End Hieu Nguyen
            });
		});
	},
	
	/**
	 * Function to register the scroll bar for modals in picklist editor
	 */
	registerScrollForModal : function(form) {
		var formHeight = form.find('.modal-body').height();
		var contentHeight = parseInt(formHeight);
		if (contentHeight > 300) {
			app.helper.showVerticalScroll(form.find('.modal-body'), {
				'setHeight': '300px'
			});
		}
	},
	
	/**
	 * Function to register the scroll bar for NonEditable Picklist Values
	 */
	registerScrollForNonEditablePicklistValues : function(container) {
        
        app.helper.showVerticalScroll(jQuery(container).find('.nonEditablePicklistValues'),{ setHeight: '70px'});
	},

	registerDeleteItemEvent : function() {
		var thisInstance = this;
        var container = this.getContainer();
		deletePopupShown = false;
		container.on('click', '.deleteItem', function(e){
			if(deletePopupShown) {
				return false;
			}
            var element = jQuery(e.currentTarget);
			var selectedListItemsArray = new Array();
            var pickListValuesTable = jQuery('#pickListValuesTable');
            selectedListItemsArray.push(jQuery(element).closest('tr').data('key'));
			var pickListValues = jQuery('.pickListValue',pickListValuesTable);
			if(pickListValues.length == 1) {
				app.helper.showErrorNotification({message: app.vtranslate('JS_YOU_CANNOT_DELETE_ALL_THE_VALUES')})
				return;
			}
			var params = {
				module : app.getModuleName(),
				parent : app.getParentModuleName(),
				source_module : jQuery('#pickListModules').val(),
				view : 'IndexAjax',
				mode : 'showDeleteView',
				pickListFieldId : jQuery('#modulePickList').val(),
				fieldValue	: JSON.stringify(selectedListItemsArray)
			}
			deletePopupShown = true;
			thisInstance.showDeleteItemForm(params);
		});
	},

	registerDeleteOptionEvent : function() {

		function result(value) {
			var replaceValueElement = jQuery('#replaceValue');
			if(typeof value.added != 'undefined'){
				var id = value.added.id;
				jQuery('#replaceValue option[value="'+id+'"]').remove();
				replaceValueElement.trigger('change');
			} else {
				var id = value.removed.id;
				var text = value.removed.text;
				replaceValueElement.append('<option value="'+id+'">'+text+'</option>');
				replaceValueElement.trigger('change');
			}
		}
		jQuery('[name="delete_value[]"]').on("change", function(e) {
			result({
				val:e.val,
				added:e.added,
				removed:e.removed
				});
		})
	},

	duplicateItemNameCheck : function(container) {
		var pickListValues = JSON.parse(jQuery('[name="pickListValues"]',container).val());
		var pickListValuesArr = new Array();
		jQuery.each(pickListValues,function(i,e){
			var decodedValue = app.helper.getDecodedValue(e);
			pickListValuesArr.push(jQuery.trim(decodedValue.toLowerCase()));
		});

		var mode = jQuery('[name="mode"]', container).val();
		var newValues;
		if(mode == 'edit') {
			newValues = jQuery.trim(jQuery('[name="renamedValue"]', container).val());
		} else {
			newValues = jQuery.trim(jQuery('[name="newValue"]', container).val());
		}
		var newValuesArray = newValues.split(',');
		var duplicateFlag = true;
		for (i = 0; i < newValuesArray.length; i++) {
			var newValue = newValuesArray[i];
			var lowerCasedNewValue = newValue.toLowerCase();

			//Checking the new picklist value is already exists
			if (jQuery.inArray(lowerCasedNewValue, pickListValuesArr) != -1) {
				//while renaming the picklist values
				if (mode == 'edit') {
					var oldValue = jQuery.trim(jQuery('[name="oldValue"]', container).val());
					var lowerCasedOldValue = oldValue.toLowerCase();
					if (lowerCasedOldValue == lowerCasedNewValue) {
						return duplicateFlag = false;
					}
				}
				//while adding or renaming with different existing value
				return duplicateFlag = true;
			} else {
				duplicateFlag = false;
			}
		}
		return duplicateFlag;
	},

	registerChangeRoleEvent : function() {
		jQuery('#rolesList').on('change',function(e) {
			app.helper.showProgress();
			var rolesList = jQuery(e.currentTarget);
			var params = {
				module : app.getModuleName(),
				parent : app.getParentModuleName(),
				view : 'IndexAjax',
				mode : 'getPickListValueByRole',
				source_module: jQuery('#pickListModules').val(),	// Added by Hieu Nguyen on 2018-07-07 to fix bug PickList did not translated in Assign Role tab
				rolesSelected : rolesList.val(),
				pickListFieldId : jQuery('#modulePickList').val()
			}
			app.request.post({data: params}).then(function(error, data) {
				jQuery('#pickListValeByRoleContainer').html(data);
                vtUtils.showSelect2ElementView(jQuery('#role2picklist'));
				Settings_Picklist_Js.registerenableOrDisableListSaveEvent();
				app.helper.hideProgress();
			});
		})
	},

    // Refactored code and modified by Hieu Nguyen on 2021-06-15 to display the right item label after add new item
	registerAddItemSaveEvent: function(container) {
        var thisInstance = this;
        var form = container.find('[name="addItemForm"]');

        var params = {
            submitHandler: function(form) {
                var specialChars = /[<\>\"\,\[\]\{\}]/;
				var newValueEle = jQuery('[name="newValue"]', container);
				var newValue = newValueEle.val();

				var showValidationParams = {
                    position: {
                        my: 'bottom left',
                        at: 'top left',
                        container: jQuery(form)
                    }
                };

                if (newValue.trim() == '') {
                    var errorMessage = app.vtranslate('JS_REQUIRED_FIELD');
                    vtUtils.showValidationMessage(newValueEle, errorMessage, showValidationParams);
                    return false;
                }

                if (specialChars.test(newValue)) {
                    var errorMessage = app.vtranslate('JS_SPECIAL_CHARACTERS') + " < > \" , [ ] { } " + app.vtranslate('JS_NOT_ALLOWED');
                    vtUtils.showValidationMessage(newValueEle, errorMessage, showValidationParams);
                    return false;
                }

				if (Settings_Picklist_Js.duplicateItemNameCheck(container)) {
					var errorMessage = app.vtranslate('JS_DUPLICATE_ENTRIES_FOUND_FOR_THE_VALUE');
                    vtUtils.showValidationMessage(newValueEle, errorMessage, showValidationParams);  
					return false;
				}
				
				vtUtils.hideValidationMessage(newValueEle);
				
				var params = jQuery(form).serializeFormData();
				params.newValue = jQuery.trim(params.newValue);
                app.helper.showProgress();

				app.request.post({data: params}).then(function(error, data) {
                    var newElement = thisInstance.getPickListTemplate(data.labelDisplay, params.selectedColor);
                    var newPickListValueRow = jQuery(newElement).appendTo(jQuery('#pickListValuesTable').find('tbody'));

                    let itemKey = params.newValue;
                    let itemId = data['id'];
                    newPickListValueRow.attr('data-key', itemKey);
                    newPickListValueRow.attr('data-key-id', itemId);

					app.helper.hideModal();
					app.helper.hideProgress();
					app.helper.showSuccessNotification({ message: app.vtranslate('JS_ITEM_ADDED_SUCCESSFULLY') });

					// Update the new item in the hidden picklist values array
					var pickListValuesEle = jQuery('[name="pickListValues"]');
					var pickListValuesArray = JSON.parse(pickListValuesEle.val());

					pickListValuesArray[itemId] = itemKey;
					pickListValuesEle.val(JSON.stringify(pickListValuesArray));
				});
            }
        };

        form.vtValidate(params);
	},

	registerRenameItemSaveEvent : function() {
        var thisInstance = this;
        var form = jQuery('#renameItemForm');
        var params = {
            submitHandler: function(form) {
                var form = jQuery(form);
                var specialChars = /[<\>\"\,\[\]\{\}]/;
				var newValueEle = jQuery('[name="renamedValue"]',form);
				var newValue = jQuery.trim(newValueEle.val());
				if(Settings_Picklist_Js.duplicateItemNameCheck(form)) {
					var errorMessage = app.vtranslate('JS_DUPLICATE_ENTRIES_FOUND_FOR_THE_VALUE');
					var params = {
						position: {
							'my' : 'bottom left',
							'at' : 'top left',
							'container' : form
					}};
                    vtUtils.showValidationMessage(newValueEle, errorMessage, params);
					return false;
				}
				var oldElem = jQuery('[name="oldValue"]',form);
				var oldValue = oldElem.val();
				var id = oldElem.find('option[value="'+oldValue+'"]').data('id');

                // Added by Hieu Nguyen on 2021-06-15 to track labels changed
                let itemLabelDisplayEnInput = form.find('[name="itemLabelDisplayEn"]');
                let itemLabelDisplayVnInput = form.find('[name="itemLabelDisplayVn"]');

                if (itemLabelDisplayEnInput.val() != itemLabelDisplayEnInput.data('curValue')) {
                    form.find('[name="itemLabelDisplayEnChanged"]').val(1);
                }

                if (itemLabelDisplayVnInput.val() != itemLabelDisplayVnInput.data('curValue')) {
                    form.find('[name="itemLabelDisplayVnChanged"]').val(1);
                }
                // End Hieu Nguyen

				var params = form.serializeFormData();
                if (specialChars.test(newValue)) {
                    var showValidationParams = {
						position: {
								my: 'bottom left',
								at: 'top left',
								container : form
					}};
                    var errorMessage = app.vtranslate('JS_SPECIAL_CHARACTERS') + " < > \" , [ ] { } " + app.vtranslate('JS_NOT_ALLOWED');
                    vtUtils.showValidationMessage(newValueEle, errorMessage, showValidationParams);
                    return false;
                }
				params.newValue = newValue;
				params.id = id;
                var rolesListArray = Settings_Picklist_Js.getRolesList();
                if(Object.keys(rolesListArray).length > 0){
                    params['rolesList'] = rolesListArray;
                }
				app.request.post({data: params}).then(function(error, data) {
					if(!error){
						app.helper.hideModal();
						var encodedOldValue = oldValue.replace(/"/g, '\\"');
						var renamedElement = thisInstance.getPickListTemplate(newValue, params.selectedColor);
						var renamedElement = jQuery(renamedElement).attr('data-key',newValue).attr('data-key-id',id);
						var oldElement = jQuery('[data-key="'+encodedOldValue+'"]');
						if(oldElement.data('deletable') == false) {
							renamedElement.data('deletable', false);
							renamedElement.find('.deleteItem').remove();
						}
						oldElement.replaceWith(renamedElement)
                        app.helper.showSuccessNotification({message: app.vtranslate('JS_STATUS_UPDATE_SUCCESS_MSG')});

                        //update the new item in the hidden picklist values array
                        var pickListValuesEle = jQuery('[name="pickListValues"]');
                        var pickListValuesArray = JSON.parse(pickListValuesEle.val());
                        pickListValuesArray[id] = newValueEle.val();
                        pickListValuesEle.val(JSON.stringify(pickListValuesArray));
					}

                    // Added by Hieu Nguyen on 2019-05-29 to reload the item list
                    jQuery('#modulePickList').trigger('change');
                    // End Hieu Nguyen
				});
            }
        };
        form.vtValidate(params);
        
        form.on('change', '[name="oldValue"]', function(e) {
            var element = jQuery(e.currentTarget);
            var value = element.val();
            var renameElement = jQuery('[name=renamedValue]');
            renameElement.val(value);
            var id = element.find('option[value="'+value+'"]').data('id');
            if(element.find('option[value="'+value+'"]').data('edit-disabled')) {
                renameElement.attr('disabled', 'disabled');
            } else {
                renameElement.removeAttr('disabled');
            }
            var picklistColorMap = JSON.parse(form.find('[name="picklistColorMap"]').val());
            var color = picklistColorMap[id];
            var colorPickerDiv = form.find('.colorPicker');
            var selectedColorElement = form.find('[name=selectedColor]');
            if(!color) {
                color = app.helper.getRandomColor();
                selectedColorElement.val(color);
            }
            colorPickerDiv.ColorPickerSetColor(color);
        });
	},

	showDeleteItemForm : function(params) {
		var thisInstance = this;
		app.request.post({data: params}).then(function(error, data){
			app.helper.showModal(data, {cb: callBackFunction});
		});

		var callBackFunction = function(data) {
			deletePopupShown = false;
			var form = data.find('#deleteItemForm');
			thisInstance.registerScrollForModal(form);
			thisInstance.registerScrollForNonEditablePicklistValues(form);
			var maximumSelectionSize = jQuery('#pickListValuesCount').val()-1;
			vtUtils.showSelect2ElementView(jQuery('[name="delete_value[]"]'), {maximumSelectionSize: maximumSelectionSize, dropdownCss : {'z-index' : 100001}});
			jQuery('[name="delete_value[]"]').on('change', function() {
				thisInstance.registerScrollForModal(form);
			});
			Settings_Picklist_Js.registerDeleteOptionEvent();
            
            var params = {
                submitHandler: function(form) {
                    var deleteValues = jQuery('[name="delete_value[]"]').val();
                    var params = jQuery(form).serializeFormData();
                    app.request.post({data: params}).then(function(error, data) {
                        if(data){
                            app.helper.hideModal();
                            //delete the item in the hidden picklist values array
                            var pickListValuesEle = jQuery('[name="pickListValues"]');
                            var pickListValuesArray = JSON.parse(pickListValuesEle.val());
                            jQuery.each(deleteValues,function(i,e){
                                var encodedOldValue = e.replace(/"/g, '\\"');
                                jQuery('[data-key-id="'+encodedOldValue+'"]').remove();
                                delete pickListValuesArray[e];
                            });
                            pickListValuesEle.val(JSON.stringify(pickListValuesArray));
                            app.helper.showSuccessNotification({message: app.vtranslate('JS_ITEMS_DELETED_SUCCESSFULLY')});
                        }
                    });
                }
            };
            form.vtValidate(params);
		}
	},

	registerPickListValuesSortableEvent : function() {
        var thisInstance = this;
		var tbody = jQuery( "tbody",jQuery('#pickListValuesTable'));
		tbody.sortable({
			'helper' : function(e,ui){
				//while dragging helper elements td element will take width as contents width
				//so we are explicity saying that it has to be same width so that element will not
				//look like distrubed
				ui.children().each(function(index,element){
					element = jQuery(element);
					element.width(element.width());
				})
				return ui;
			},
			'containment' : tbody,
			'revert' : true,
			update: function(e, ui ) {
                thisInstance.saveSequence();
			}
		});
	},
    
    saveSequence : function() {
        app.helper.showProgress();
        var pickListValuesSequenceArray = {}
        var pickListValues = jQuery('#pickListValuesTable').find('.pickListValue');
        jQuery.each(pickListValues,function(i,element) {
            pickListValuesSequenceArray[jQuery(element).data('key-id')] = ++i;
        });
        var params = {
            module : app.getModuleName(),
            parent : app.getParentModuleName(),
            action : 'SaveAjax',
            mode : 'saveOrder',
            picklistValues : pickListValuesSequenceArray,
            picklistName : jQuery('[name="picklistName"]').val()
        }
        var rolesListArray = Settings_Picklist_Js.getRolesList();
        if(Object.keys(rolesListArray).length > 0){
            params['rolesList'] = rolesListArray;
        }
        app.request.post({data: params}).then(function(error, data) {
            app.helper.hideProgress();
            if(data) {
                app.helper.showSuccessNotification({message: app.vtranslate('JS_SEQUENCE_UPDATED_SUCCESSFULLY')});
            }
        });
    },

    getRolesList : function(){
        var rolesListArray = {};
        var rolesList = jQuery('#rolesList option');
        if(rolesList){
            jQuery.each(rolesList, function(i,element){
                rolesListArray[i] = element.getAttribute('value');
            });
        }
        return rolesListArray;
    },
    
	registerAssingValueToRoleTabClickEvent : function() {
		jQuery('#assignedToRoleTab').on('click',function(e) {
			jQuery('#rolesList').trigger('change');
		});
	},
    
    getPickListTemplate : function(value, color) {
        var contrast = app.helper.getColorContrast(color);
        var textColor = (contrast === 'dark') ? 'white' : 'black';
        var actions = jQuery('.picklistActionsTemplate').html();
        var actionsTemplate = '<span class="pull-right picklistActions" style="margin-top:0px;">' + actions + '</span>';
        var template = '<tr class="pickListValue cursorPointer">'+
                            '<td class="textOverflowEllipsis fieldPropertyContainer">'+
                                '<span class="pull-left">' +
                                    '<i class="far fa-grip-lines alignMiddle"></i>&nbsp;&nbsp;' +
                                    '<span class="picklist-color" style="background-color: '+ color + ';color: '+ textColor +';">' + value + '</span>' + 
                                '</span>' +
                                actionsTemplate +
                            '</td>'+
                        '</tr>';
                    
        return template;
    },
    
    registerColorPickerEvent : function(container) {
        var colorPickerDiv = container.find('.colorPicker');
        var selectedColorElement = container.find('[name=selectedColor]');
        app.helper.initializeColorPicker(colorPickerDiv, {}, function(hsb, hex, rgb) {
            var selectedColorCode = '#'+hex;
            selectedColorElement.val(selectedColorCode);
        });
        var color = selectedColorElement.val();
        if(!color) {
            color = '#ffffff';
            selectedColorElement.val(color);
        }
        colorPickerDiv.ColorPickerSetColor(color);
    },

	registerItemActions : function() {
		Settings_Picklist_Js.registerAddItemEvent();
		Settings_Picklist_Js.registerChangeRoleEvent();
		Settings_Picklist_Js.registerAssingValueToRoleTabClickEvent();
		Settings_Picklist_Js.registerPickListValuesSortableEvent();
	},


	registerEvents : function() {
		Settings_Picklist_Js.registerModuleChangeEvent();
		Settings_Picklist_Js.registerModulePickListChangeEvent();
		Settings_Picklist_Js.registerItemActions();
        Settings_Picklist_Js.registerRenameItemEvent();
		Settings_Picklist_Js.registerDeleteItemEvent();
		
		var instance = new Settings_Vtiger_Index_Js();
		instance.registerBasicSettingsEvents();
	},

    // Implemented by Hieu Nguyen on 2019-05-29
    registerItemValueChangeEvent: function(form) {
        // Make item value non-unicode
        form.find('input[name="newValue"], input[name="renamedValue"]').on('keyup', function(e) {
			var value = jQuery(e.currentTarget).val().trim();
			
            if(value.isUnicode()) {
                jQuery(this).val(value.unUnicode());
            }
		});
    }
}

jQuery(document).ready(function(){
	Settings_Picklist_Js.registerEvents();
});
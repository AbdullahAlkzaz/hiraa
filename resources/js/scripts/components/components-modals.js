/*=========================================================================================
    File Name: components-modal.js
    Description: Modals are streamlined, but flexible, dialog prompts with the minimum
				required functionality and smart defaults.
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function (window, document, $) {
  'use strict';

  /******************/
  // Modal events //
  /******************/

  // onShow event
  var showModartligger = document.getElementById('onshow');

  var showModal = new bootstrap.Modal(showModartligger, {
    title: 'Modal Show Event',
    trigger: 'click',
    placement: 'right'
  });

  showModartligger.addEventListener('show.bs.modal', function () {
    alert('Show event fired.');
  });

  // onShown event
  var shownModartligger = document.getElementById('onshown');

  var shownModal = new bootstrap.Modal(shownModartligger, {
    title: 'Modal Shown Event',
    trigger: 'click',
    placement: 'right'
  });

  shownModartligger.addEventListener('shown.bs.modal', function () {
    alert('Shown event fired.');
  });

  // onHide event
  var hideModartligger = document.getElementById('onhide');

  var hideModal = new bootstrap.Modal(hideModartligger, {
    title: 'Modal Hide Event',
    trigger: 'click',
    placement: 'right'
  });

  hideModartligger.addEventListener('hide.bs.modal', function () {
    alert('Hide event fired.');
  });

  // onHidden event
  var hiddenModartligger = document.getElementById('onhidden');

  var hiddenModal = new bootstrap.Modal(hiddenModartligger, {
    title: 'Modal Hidden Event',
    trigger: 'click',
    placement: 'right'
  });

  hiddenModartligger.addEventListener('hidden.bs.modal', function () {
    alert('Hidden event fired.');
  });
})(window, document, jQuery);

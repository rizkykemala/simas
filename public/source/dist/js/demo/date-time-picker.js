/*
** Date-Time Picker JS
*** @version v1.4.0
**** @copyright 2018 Pepdev.
*/
$(function() {
    // Pick a accessibility labels
    $('.pickadate-accessibility-labels').pickadate({
    	labelMonthNext: 'Go to the next month',
    	labelMonthPrev: 'Go to the previous month',
    	labelMonthSelect: 'Pick a month from the dropdown',
    	labelYearSelect: 'Pick a year from the dropdown',
    	selectMonths: true,
    	selectYears: 200
    });
});
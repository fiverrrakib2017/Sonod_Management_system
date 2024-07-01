/**
 * Created by mehedi on 2/16/17 Only for control Chart in dashboard.
 */

$(document).ready(function () {
    $.ajax({

        url: "?c=dashboard&m=ajax_dashboard",
        method: "GET",
        dataType: "json",

        success: function (data) {
console.log(data);
            var acc_amount = [];
            var chart_date = [];
            var exp_amount = [];
            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];

            /*
             ========= Chart for Last 12 months bill collection =============
             */
            for (i = 0; i < 12; i++) {

                if (data[i].inc_date || data[i].exp_amount) {

                    var dateForCheck = new Date(data[i].inc_date);

                    if (dateForCheck.getTime() != 0) {// its mean timeField is not null

                        dateForShowChart = new Date(data[i].inc_date);

                    } else {

                        dateForShowChart = new Date(data[i].exp_date);

                    }
                    var monthInNumber = dateForShowChart.getMonth();
                    var monthInString = monthNames[monthInNumber];
                    var Year = (dateForShowChart.getFullYear() - 2000);

                    chart_date.push(monthInString + " " + Year);
                    // if(data[i].inc_date){ acc_amount.push(data[i].acc_amount);}else{ acc_amount.push("0");}
                    // if(data[i].exp_amount){ exp_amount.push(data[i].exp_amount);}else{ acc_amount.push("0");}
                    acc_amount.push(data[i].acc_amount);
                    exp_amount.push(data[i].exp_amount);

                }

            }

            var charData = {
                labels: chart_date,
                datasets: [{

                    label: 'Income',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255,99,132,1)',
                    hoverBackgroundColor: 'rgba(255, 99, 132, 0.6)',
                    hoverBorderColor: 'rgba(255, 99, 132, 1)',
                    data: acc_amount,
                    borderWidth: 1,
                },
                    {

                        label: 'Expense',
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235,1)',
                        hoverBackgroundColor: 'rgba(54, 162, 235, 0.6)',
                        hoverBorderColor: 'rgba(54, 162, 235, 1)',
                        data: exp_amount,
                        borderWidth: 1,
                    }],
            };

            var ctx = $('#accountsChart');

            var accountsChart = new Chart(ctx, {
                type: 'bar',
                data: charData,
            });

            /*
             ========= Chart for Income and Expense Chart =============
             */

            console.log(data[13]);
            var pieChartData = {
                labels: [
                    "Debit",
                    "Credit",
                ],
                datasets: [
                    {
                        data: [data[13]['debit'], data[13]['credit']],
                        backgroundColor: [
                            "#03A678",
                            "#E87E04",
                        ],
                        hoverBackgroundColor: [
                            "#03A660",
                            "#E87E14",
                        ]
                    }]
            };
            var pieChartx = $('#expenseIncome');

            var pieChart = new Chart(pieChartx, {
                type: 'doughnut',
                data: pieChartData,
            });

        }// succes function data
    }); // Ajax

}); // document ready function
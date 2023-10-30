var ctx = document.getElementsByClassName('myChart')

const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['sem.01', 'sem.02','sem.03', 'sem.04', 'sem.05', 'sem.06', 'sem07', 'sem.08'], 
        datasets: [{
            label:"Balança Financeira",
            data: [1500,200,500,2000,1000,400,800,600,],
            borderWidth: 2,
            borderColor: 'black',
            backgroundColor: '#00DCC7',
        }]
    }
});
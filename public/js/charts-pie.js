axios.get('/api/statistics').then(function (response) {
    let resData = response.data;

    for (let i = 0; i < resData.length; i++) {

        let data = [];
        let labels = [];

        for (let el of resData[i]) {
            data.push(el[Object.keys(el)[1]]);
            labels.push(el.name);
        }

        const pieConfig = {
            type: 'doughnut',
            data: {
                datasets: [
                    {
                        data: data,
                        backgroundColor: ['#0694a2', '#1c64f2', '#7e3af2', '#6875f5', '#e74694', '#10B981', '#F59E0B', '#EF4444', '#6B7280'],
                        label: 'Dataset 1',
                    },
                ],
                labels: labels
            },
            options: {
                responsive: true,
                cutoutPercentage: 80,
                legend: {
                    position: 'bottom',
                },
            },
        }

        const pieCtx = document.getElementById(`${i + 1}`)
        window.myPie = new Chart(pieCtx, pieConfig)
    }
})
    .catch(err => console.log(err))



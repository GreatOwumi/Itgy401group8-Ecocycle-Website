
    // Chart.js Example: Line Chart
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line', // Type of chart (e.g., line, bar, pie)
        data: {
            labels: ['21 Oct', '22 Oct', '23 Oct', '24 Oct', '25 Oct'], // X-axis labels
            datasets: [{
                label: 'Waste Turned In (kg)', // Chart label
                data: [100, 200, 300, 400, 500], // Y-axis data
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Fill color
                borderColor: 'rgba(75, 192, 192, 1)', // Border color
                borderWidth: 2 // Line thickness
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top', // Position of the legend
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date' // X-axis title
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Weight (kg)' // Y-axis title
                    }
                }
            }
        }
    });

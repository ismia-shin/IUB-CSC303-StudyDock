let myChart = null; 

document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    const table = document.querySelector('.table');

    if (searchInput && table) {
        searchInput.addEventListener('keyup', () => {
            const filter = searchInput.value.toLowerCase();
            const rows = table.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });

            const ctx = document.getElementById('gradeChart');
            if (ctx) {
                updateGradeChart();
            }
        });
    }

    const ctx = document.getElementById('gradeChart');
    if (ctx) {
        updateGradeChart();
    }
});

function updateGradeChart() {
    const canvasElement = document.getElementById('gradeChart');
    const table = document.querySelector('.table');
    

    const visibleRows = Array.from(table.querySelectorAll('tbody tr'))
                             .filter(row => row.style.display !== 'none');

    const labels = visibleRows.map(row => row.cells[4].innerText);
    const grades = visibleRows.map(row => parseFloat(row.cells[5].innerText));

    if (myChart) {
        myChart.destroy();
    }

    myChart = new Chart(canvasElement, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Received Grade',
                data: grades,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    title: { display: true, text: 'Grades' }
                },
                x: {
                    title: { display: true, text: 'Assessment Name' }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Assessment Performance Overview'
                }
            }
        }
    });
}
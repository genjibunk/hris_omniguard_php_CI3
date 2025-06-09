
document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.querySelector('.datatable tbody');
    const allRows = Array.from(tableBody.querySelectorAll('tr'));
    const pagination = document.getElementById('pagination-container');
    const searchBox = document.getElementById('search-input');

    const rowsPerPage = 10;
    let currentPage = 1;
    let filteredRows = [...allRows];

    const renderTable = (page = 1) => {
        tableBody.innerHTML = '';
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        filteredRows.slice(start, end).forEach(row => tableBody.appendChild(row));
        renderPagination();
    };

    const renderPagination = () => {
        pagination.innerHTML = '';
        const totalPages = Math.ceil(filteredRows.length / rowsPerPage);

        if (totalPages <= 1) return;

        const createButton = (label, enabled, onClick) => {
            const li = document.createElement('li');
            li.className = `page-item ${enabled ? '' : 'disabled'}`;
            li.innerHTML = `<a class="page-link" href="#">${label}</a>`;
            if (enabled) li.addEventListener('click', e => {
                e.preventDefault();
                onClick();
            });
            return li;
        };

        pagination.appendChild(createButton('Prev', currentPage > 1, () => {
            currentPage--;
            renderTable(currentPage);
        }));

        for (let i = 1; i <= totalPages; i++) {
            const isActive = i !== currentPage;
            pagination.appendChild(createButton(i, isActive, () => {
                currentPage = i;
                renderTable(currentPage);
            }));
        }

        pagination.appendChild(createButton('Next', currentPage < totalPages, () => {
            currentPage++;
            renderTable(currentPage);
        }));
    };

    searchBox.addEventListener('input', () => {
        const term = searchBox.value.toLowerCase();
        filteredRows = allRows.filter(row => row.textContent.toLowerCase().includes(term));
        currentPage = 1;
        renderTable(currentPage);
    });

    renderTable(currentPage);
});

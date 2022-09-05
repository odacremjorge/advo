const getCellValue = (tableRow, columnIndex) => tableRow.children[columnIndex].innerText || tableRow.children[columnIndex].textContent;

const comparer = (idx, asc) => (r1, r2) => ((el1, el2) => 
    el1 !== '' && el2 !== '' && !isNaN(el1) && !isNaN(el2) ? el1 - el2 : el1.toString().localeCompare(el2)
    )(getCellValue(asc ? r1 : r2, idx), getCellValue(asc ? r2 : r1, idx));

// do the work...
document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
    const table = th.closest('table');
    Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
        .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
        .forEach(tr => table.appendChild(tr) );
})));
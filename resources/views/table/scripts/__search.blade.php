<script>
    function mySearch()
    {
        var input, filter, table, tr, td, i, txtValue;
        const columnNumber = 2;
        input = document.getElementById("tableSearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++)
        {
            td = tr[i].getElementsByTagName("td")[columnNumber];
            if (td)
            {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1)
                {
                    tr[i].style.display = "";
                }
                else
                {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

function myFunction(){
  var input, filter, table, tr, td, i;
  input = document.getElementById('myInput');
  filter=input.value.toUpperCase();
  table=document.getElementById('myTable');
  tr=table.getElementsByName('tr');
  for(i=0;i<tr.length;i++)
  {
    td=tr[i].getElementsByName('td')[0];
    if(td)
    {
      if(td.innerHTML.toUpperCase().indexOf(filter)> -1)
      {
        tr[i].style.display="";
      }
      else {
        tr[i].style.display="none";
      }
    }
  }
}

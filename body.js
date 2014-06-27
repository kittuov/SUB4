var listdelpost= document.querySelectorAll('.delete');
function dofirst()
{
    
  //  for (var i=0;i<listdelpost.length;i++)
  //  {
   //     listdelpost.item(i).onclick=deletepost;
   // }
}
function deletepost()
{
    this.style.color='blue';
    var posttodelete = this.getAttribute('id');
    document.getElementById('post_content').getSetAttribute('value')=posttodelete;
    alert('done');
}
window.onload=dofirst;
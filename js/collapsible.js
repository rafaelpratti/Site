var coll = document.getElementById('collapsible');
var accessibilitybox = document.getElementById('acbox');
coll.addEventListener("click", function(){
    console.log("a")
    if (accessibilitybox.style.display === "block") {
        accessibilitybox.style.display = "none";
      } else {
        accessibilitybox.style.display = "block";
      }
    })

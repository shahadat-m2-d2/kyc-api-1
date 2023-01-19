window.addEventListener('load',function(){
// Sidebar //
    // Get the sidebar and elements that are used
    var sidebar = document.getElementsByClassName("sidebar")[0];
    var sidebarBtn = document.getElementById("sidebarBtn");
    var pageContent = document.getElementsByClassName("page-content")[0];

    // When the user clicks on the sidebar button, open/close sidebar
    sidebarBtn.onclick = function() {
        sidebar.classList.toggle('collapsed');
        pageContent.classList.toggle('collapsed');
    }

// Input type text with ADD option
    var multiInputBtn = document.querySelectorAll("multi-input--icon");
    var multiInput = document.querySelectorAll("multi-input");

    // When the user clicks on the sidebar button, open/close sidebar
    multiInputBtn.onclick = function() {
        console.log('ja');
    }




// MODALS 
    // Get the modal and elements that are used
    var modals = document.querySelectorAll(".modal");
    var btn = document.querySelectorAll(".modal-button");
    var closeBtns = document.getElementsByClassName("btn-close");
    var spans = document.getElementsByClassName("close");


    // When the user clicks the button, open the modal
    for (var i = 0; i < btn.length; i++) {
        btn[i].onclick = function(e) {
            e.preventDefault();
            modal = document.querySelector(e.target.getAttribute("href"));
            modal.style.display = "block";
        }
    }

    // When the user clicks on <span> (x), close the modal
    for (var i = 0; i < spans.length; i++) {
        spans[i].onclick = function() {
            for (var index in modals) {
                if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
            }
        }
    }

    // When the user clicks on <span> (x), close the modal
    for (var i = 0; i < closeBtns.length; i++) {
        closeBtns[i].onclick = function() {
            for (var index in modals) {
                if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
            }
        }
    }

    // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //     if (event.target.classList.contains('modal')) {
    //         for (var index in modals) {
    //             if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
    //         }
    //     }
    // }
});

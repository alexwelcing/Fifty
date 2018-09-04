$(document).ready(function () {
	
    //Skin switcher
    var current_skin = "skin-yellow";
	var skinName;
	
	if(typeof(Storage)!=="undefined"){
        var skinName = localStorage.getItem('skin_taxi');
		if (localStorage.getItem('skin_taxi') != null){
			$('body').removeClass(current_skin);
			current_skin = skinName;
			$('body').addClass(skinName);
			localStorage.setItem('skin_taxi',skinName);
		}
    }
	
    $('.skin-colors [data-skin]').click(function (e) {
        e.preventDefault();
        var skinName = $(this).data('skin');
        $('body').removeClass(current_skin);
        $('body').addClass(skinName);
        current_skin = skinName;
		localStorage.setItem('skin_taxi',skinName);
    });

    //Layout switcher
    var current_layout = "";
    $('.layout-select [data-layout]').click(function (e) {
        e.preventDefault();
        var layoutName = $(this).data('layout');
        $('body').removeClass(current_layout);
        $('body').addClass(layoutName);
        current_layout = layoutName;
    });

    //Sidebar switcher
    var sidebar_layout = "sidebar-mini";
    $('.sidebar-select [data-sidebar]').click(function (e) {
        e.preventDefault();
        var SidebarName = $(this).data('sidebar');
        $('body').removeClass(sidebar_layout);
        $('body').addClass(SidebarName);
        sidebar_layout = SidebarName;
    });

});
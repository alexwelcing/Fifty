<aside class="sidebar-left">
    <section class="sidebar">
	
		<div class="user-panel">
<div class="pull-left image">
<img src="resources/img/icons/icon-user.png" class="img-circle" alt="User Image">
</div>
<div class="info">
<p>Brian Mayer</p>
<p><small>Driver</small>
</p>
<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
</div>

</div>
	
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            
            <!--Dashboard-->
            <li class="treeview {{ ($active=='dashboard'?'active':'') }}"><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>


            <!--States-->
            <li class="treeview {{ ($active=='states'?'active':'') }}"><a href="{{ route('states.index') }}"><i class="fa fa-globe"></i> <span>States</span></a></li>

            <!--categories-->
            <li class="treeview {{ ($active=='categories'?'active':'') }}"><a href="{{ route('categories.index') }}"><i class="fa fa-forward"></i> <span>Categories</span></a></li>

            <!--states data-->
            <li class="treeview {{ ($active=='datas'?'active':'') }}"><a href="{{ route('datas.index') }}"><i class="fa fa-database"></i> <span>States Data</span></a></li>

             <!--maps data-->
            <li class="treeview {{ ($active=='maps'?'active':'') }}"><a href="{{ route('maps.index') }}"><i class="fa fa-map-o"></i> <span>Maps Data</span></a></li>
			<!---Questions data-->
            <li class="treeview {{ ($active=='questions'?'active':'') }}"><a href="{{ route('questions.index') }}"><i class="fa fa-question-circle-o"></i><span>Questions</span>
           
		   <li class="treeview {{ ($active=='statesthreefourty'?'active':'') }}"><a href="{{ route('statesthreefourty.index') }}"><i class="fa fa-question-circle-o"></i><span>States 340 B</span>
			
             <li class="treeview {{ ($active=='uploadcsv'?'active':'') }}"><a href="{{ route('uploadcsv.create') }}"><i class="fa fa-question-circle-o"></i><span>Upload CSV</span>

            <li class="treeview {{ ($active=='uploadstatecsv'?'active':'') }}"><a href="{{ route('uploadstatecsv.create') }}"><i class="fa fa-question-circle-o"></i><span>Uploadstatecsv</span>
            @if(auth()->user()->roles_id=='1')
			<!---Users data-->
			<li class="treeview {{ ($active=='users'?'active':'') }}"><a href="{{ route('users.index') }}"><i class="fa fa-users"></i><span>Users</span>
			
			@endif
			
 
        </ul>
        <!-- /. sidebar-menu -->
    </section>
</aside>
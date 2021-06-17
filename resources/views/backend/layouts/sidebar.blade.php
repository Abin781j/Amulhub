<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('admin')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Banner
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('file-manager')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Media Manager</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-image"></i>
        <span>Banners</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Banner Options:</h6>
          <a class="collapse-item" href="{{route('banner.index')}}">Banners</a>
          <a class="collapse-item" href="{{route('banner.create')}}">Add Banners</a>
        </div>
      </div>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider">
     <!-- Heading -->
     <div class="sidebar-heading">
         POS
     </div>
 <!-- Employees -->
 <li class="nav-item">
     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#employeeCollapse" aria-expanded="true" aria-controls="employeeCollapse">
       <i class="fas fa-users"></i>
       <span>Employee</span>
     </a>
     <div id="employeeCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
       <div class="bg-white py-2 collapse-inner rounded">
         <h6 class="collapse-header">Employee Options:</h6>
         <a class="collapse-item" href="{{route('employees.index')}}">Employees</a>
         <a class="collapse-item" href="{{route('employees.create')}}">Add Employee</a>
         
       </div>
     </div>
 </li>
  <!-- Designations -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#designationsCollapse" aria-expanded="true" aria-controls="designationsCollapse">
      <i class="fas fa-users"></i>
      <span>Designations</span>
    </a>
    <div id="designationsCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Designation Options:</h6>
        <a class="collapse-item" href="{{route('designation.index')}}">All Designations</a>
        <a class="collapse-item" href="{{route('designation.create')}}">Add Designation</a>
        
      </div>
    </div>
</li>
 <!-- Jobs -->
 <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#jobsCollapse" aria-expanded="true" aria-controls="jobsCollapse">
    <i class="fas fa-users"></i>
    <span>Jobs</span>
  </a>
  <div id="jobsCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Designation Options:</h6>
      <a class="collapse-item" href="{{route('job.index')}}">All Job Requests</a> 
    </div>
  </div>
</li>
<!-- Salaries -->
 <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#salariesCollapse" aria-expanded="true" aria-controls="salariesCollapse">
    <i class="fas fa-users"></i>
    <span>Salaries</span>
  </a>
  <div id="salariesCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Employee Options:</h6>
      <a class="collapse-item" href="{{route('salaries.index')}}">Salary list</a>
      <a class="collapse-item" href="{{route('salaries.create')}}">Add Salary</a>
      <a class="collapse-item" href="{{route('salaries.pay_salary')}}">Pay Salary</a>
      <a class="collapse-item" href="">Last Month Salary</a>
    </div>
  </div>
</li>
<!-- Suppliers -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#suppliersCollapse" aria-expanded="true" aria-controls="suppliersCollapse">
    <i class="fas fa-warehouse"></i>
    <span>Suppliers</span>
  </a>
  <div id="suppliersCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Suppliers Options:</h6>
      <a class="collapse-item" href="{{route('suppliers.index')}}">All Suppliers</a>
      <a class="collapse-item" href="{{route('suppliers.create')}}">Add Suppliers</a>
    </div>
  </div>
</li>
<!-- Expenses -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#expensesCollapse" aria-expanded="true" aria-controls="expensesCollapse">
    <i class="fas fa-warehouse"></i>
    <span>Expenses</span>
  </a>
  <div id="expensesCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Expense Options:</h6>
      <a class="collapse-item" href="{{route('expenses.index')}}">All Expenses</a>
      <a class="collapse-item" href="{{route('expenses.create')}}">Add Expenses</a>
    </div>
  </div>
</li>
<!-- Attendences -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#attendencesCollapse" aria-expanded="true" aria-controls="attendencesCollapse">
    <i class="fas fa-warehouse"></i>
    <span>Attendences</span>
  </a>
  <div id="attendencesCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Attendences Options:</h6>
      <a class="collapse-item" href="{{route('attendences.all')}}">All Attendence</a>
      <a class="collapse-item" href="{{route('attendences.create')}}">Take Attendence</a>
    </div>
  </div>
</li>
    <!-- Divider -->
    <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Shop
        </div>
   
    <!-- Categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse">
          <i class="fas fa-sitemap"></i>
          <span>Category</span>
        </a>
        <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Options:</h6>
            <a class="collapse-item" href="{{route('category.index')}}">Category</a>
            <a class="collapse-item" href="{{route('category.create')}}">Add Category</a>
          </div>
        </div>
    </li>
    
    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
          <i class="fas fa-cubes"></i>
          <span>Products</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Options:</h6>
            <a class="collapse-item" href="{{route('product.index')}}">Products</a>
            <a class="collapse-item" href="{{route('product.create')}}">Add Product</a>
            <a class="collapse-item" href="{{route('product.importp')}}">Import Product</a>

          </div>
        </div>
    </li>


    {{-- Shipping --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingCollapse" aria-expanded="true" aria-controls="shippingCollapse">
          <i class="fas fa-truck"></i>
          <span>Shipping</span>
        </a>
        <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Shipping Options:</h6>
            <a class="collapse-item" href="{{route('shipping.index')}}">Shipping</a>
            <a class="collapse-item" href="{{route('shipping.create')}}">Add Shipping</a>
          </div>
        </div>
    </li>

    <!--Orders -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Orders</span>
        </a>
    </li>

    <!-- Reviews -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('review.index')}}">
            <i class="fas fa-comments"></i>
            <span>Reviews</span></a>
    </li>
    


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
       Posts
     </div>
 
     <!-- Posts -->
     <li class="nav-item">
       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCollapse" aria-expanded="true" aria-controls="postCollapse">
         <i class="fas fa-fw fa-folder"></i>
         <span>Posts</span>
       </a>
       <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
         <div class="bg-white py-2 collapse-inner rounded">
           <h6 class="collapse-header">Post Options:</h6>
           <a class="collapse-item" href="{{route('post.index')}}">Posts</a>
           <a class="collapse-item" href="{{route('post.create')}}">Add Post</a>
         </div>
       </div>
     </li>
 
      <!-- Category -->
      <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCategoryCollapse" aria-expanded="true" aria-controls="postCategoryCollapse">
           <i class="fas fa-sitemap fa-folder"></i>
           <span>Category</span>
         </a>
         <div id="postCategoryCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Category Options:</h6>
             <a class="collapse-item" href="{{route('post-category.index')}}">Category</a>
             <a class="collapse-item" href="{{route('post-category.create')}}">Add Category</a>
           </div>
         </div>
       </li>
 
       <!-- Tags -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse" aria-expanded="true" aria-controls="tagCollapse">
             <i class="fas fa-tags fa-folder"></i>
             <span>Tags</span>
         </a>
         <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Tag Options:</h6>
             <a class="collapse-item" href="{{route('post-tag.index')}}">Tag</a>
             <a class="collapse-item" href="{{route('post-tag.create')}}">Add Tag</a>
             </div>
         </div>
     </li>
 
       <!-- Comments -->
       <li class="nav-item">
         <a class="nav-link" href="{{route('comment.index')}}">
             <i class="fas fa-comments fa-chart-area"></i>
             <span>Comments</span>
         </a>
       </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
     <!-- Heading -->
    <div class="sidebar-heading">
        General Settings
    </div>
    <li class="nav-item">
      <a class="nav-link" href="{{route('coupon.index')}}">
          <i class="fas fa-table"></i>
          <span>Coupon</span></a>
    </li>
     <!-- Users -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>
     <!-- General settings -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('settings')}}">
            <i class="fas fa-cog"></i>
            <span>Settings</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
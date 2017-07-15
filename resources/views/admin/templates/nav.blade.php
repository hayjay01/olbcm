          <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="{{ route('admin.home') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                    <li><a href="{{ route('account.create') }}"><i class="glyphicon glyphicon-pencil"></i> Add Account Type</a></li>
                    <li><a href="{{ route('account_type') }}"><i class="glyphicon glyphicon-stats"></i> All Account Type</a></li>
                    <li><a href="{{ route('user.create') }}"><i class="glyphicon glyphicon-user"></i> Create Customer</a></li>                    
                    <li><a href="{{ route('users') }}"><i class="glyphicon glyphicon-stats"></i> Manage Customer</a></li>
                    {{-- <li><a href="{{ route('customer_profile_get.all') }}"><i class="glyphicon glyphicon-user"></i> All Customer's Profile</a></li> --}}
                    <li><a href="{{ route('transactions.search') }}"><i class="glyphicon glyphicon-pencil"></i> Create Transaction</a></li>
                    <li><a href="{{ route('transaction.all') }}"><i class="glyphicon glyphicon-tasks"></i> All Transaction</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="{{ route('settings') }}">Site Settiongs</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
          </div>
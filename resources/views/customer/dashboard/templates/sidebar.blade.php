<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{ route('customer.home') }}" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('customer.profile', ['id' => Auth::user()->id]) }}" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Profile</a>
                </li>
                <li>
                    <a href="{{ route('customer_transaction.history', ['id' => Auth::user()->id]) }}" class="waves-effect"><i class="fa fa-table m-r-10" aria-hidden="true"></i>Transaction History</a>
                </li>
                <li>
                    <a href="{{ route('error.404') }}" class="waves-effect"><i class="fa fa-font m-r-10" aria-hidden="true"></i>Make Transfer</a>
                </li>
                <li>
                    <a href="{{ route('error.404') }}" class="waves-effect"><i class="fa fa-globe m-r-10" aria-hidden="true"></i>Pay Bills</a>
                </li>
                <li>
                    <a href="{{ route('error.404') }}" class="waves-effect"><i class="fa fa-columns m-r-10" aria-hidden="true"></i>Connect to Western Union</a>
                </li>
                <li>
                    <a href="{{ route('customer.logout') }}" class="waves-effect"><i class="fa fa-info-circle m-r-10" aria-hidden="true"></i>Logout</a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
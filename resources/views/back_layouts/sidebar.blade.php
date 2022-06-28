<div class="page-sidebar">
    <ul class="list-unstyled accordion-menu">
        <li class="sidebar-title">
            Main
        </li>

        <li class="active-page">
            <a href="{{route("panel.index")}}"><i data-feather="home"></i>Homepage</a>
        </li>

        <li>
            <a href="#"><i data-feather="code"></i>Countries<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul class="">
                <li>
                    <a href="{{route("panel.country.index")}}">
                        <i class="far fa-circle"></i> All Countries
                    </a>
                    <a href="{{route("panel.country.add")}}">
                        <i class="far fa-circle"></i> Add Countries
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#"><i data-feather="code"></i>Cities<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul class="">
                <li>
                    <a href="{{route("panel.city.index")}}">
                        <i class="far fa-circle"></i> All Cities
                    </a>
                    <a href="{{route("panel.city.add")}}">
                        <i class="far fa-circle"></i> Add City
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#"><i data-feather="code"></i>Continent<i class="fas fa-chevron-right dropdown-icon"></i></a>
            <ul class="">
                <li>
                    <a href="{{route("panel.continent.index")}}">
                        <i class="far fa-circle"></i> All Continents
                    </a>
                    <a href="{{route("panel.continent.add")}}">
                        <i class="far fa-circle"></i> Add Continent
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{route("panel.logout")}}"><i data-feather="home"></i>Logout</a>
        </li>


    </ul>
</div>

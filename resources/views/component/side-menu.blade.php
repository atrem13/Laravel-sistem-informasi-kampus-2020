
    @php
        $menus = [
                    ['link'=>'dosen', 'icon'=>'fas fa-chalkboard-teacher'],
                    ['link'=>'hari', 'icon'=>'fas fa-calendar-alt'],
                    ['link'=>'jadwal-kuliah', 'icon'=>'fas fa-university'],
                    ['link'=>'khs', 'icon'=>'fas fa-poll'],
                    ['link'=>'krs', 'icon'=>'fas fa-poll-h'],
                    ['link'=>'mahasiswa', 'icon'=>'fas fa-users'],
                    ['link'=>'matakuliah', 'icon'=>'fab fa-leanpub'],
                    ['link'=>'prodi', 'icon'=>'fas fa-graduation-cap'],
                    ['link'=>'ruangan', 'icon'=>'far fa-building']
        ];
    @endphp
    @foreach ($menus as $menu)

        <li class="nav-item">
            <a href="{{route($menu['link'].".index")}}" class="nav-link">
            <i class="nav-icon {{$menu['icon']}}"></i>
            <p>
                {{$menu['link']}}
            </p>
            </a>
        </li>
    @endforeach


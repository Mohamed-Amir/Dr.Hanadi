<div class="profile-content">
    <div class="profile-name"> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</div>
    <div class="profile-designation">Job name</div>
    <p class="profile-description">Lorem ipsum dolor sit amet, consetetur sadipscing
        elitr, sed diam nonumy eirmod tempor.</p>
    <ul class="profile-info-list">
        <a href="" class="profile-info-list-item"><i
                    class="mdi mdi-eye"></i>Timeline</a>
        <a href="" class="profile-info-list-item"><i class="mdi mdi-bookmark-check"></i>My
            programs</a>
        <a href="{{route('userFront.logout')}}" class="profile-info-list-item"><i class="mdi mdi-account"></i>Logout</a>

    </ul>
</div>
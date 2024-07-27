<div>
    <img src="../assets/images/users/{{ $personne->image_student }}" alt="user" class="rounded-circle" width="40">
    <span class="ms-2 d-none d-lg-inline-block">
        <span>{{ $title }},</span>
        <span class="text-dark">
            @if($personne)
                {{ $personne->student_prenom }} {{ strtoupper($personne->student_nom) }}
            @else
                Utilisateur
            @endif
        </span>
        <i data-feather="chevron-down" class="svg-icon"></i>
    </span>
</div>

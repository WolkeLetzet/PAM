@php
foreach ($users as $user) {
   # code...

//for ($i = 0; $i < count($users); $i++) {
    if (array_key_exists($user->email,$roles)) {
       echo " |";
    }
    // syncRoles()
}
@endphp

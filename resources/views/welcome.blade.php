<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
     Hello There {{$name}} <br/>
     Current time is {{ now() }}
     <br/>
     <x-alert type="danger" :message="$message"/>
    </br>
</div>

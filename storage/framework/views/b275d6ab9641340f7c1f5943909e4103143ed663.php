<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('compte')->html();
} elseif ($_instance->childHasBeenRendered('QtAX4O9')) {
    $componentId = $_instance->getRenderedChildComponentId('QtAX4O9');
    $componentTag = $_instance->getRenderedChildComponentTagName('QtAX4O9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('QtAX4O9');
} else {
    $response = \Livewire\Livewire::mount('compte');
    $html = $response->html();
    $_instance->logRenderedChild('QtAX4O9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\laragon\www\Osature\resources\views/administration/layoutAdmin/bodyCompte.blade.php ENDPATH**/ ?>
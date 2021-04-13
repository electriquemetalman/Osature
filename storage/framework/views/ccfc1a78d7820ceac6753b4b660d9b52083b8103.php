<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('faq')->html();
} elseif ($_instance->childHasBeenRendered('UfKlHTc')) {
    $componentId = $_instance->getRenderedChildComponentId('UfKlHTc');
    $componentTag = $_instance->getRenderedChildComponentTagName('UfKlHTc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('UfKlHTc');
} else {
    $response = \Livewire\Livewire::mount('faq');
    $html = $response->html();
    $_instance->logRenderedChild('UfKlHTc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\laragon\www\Osature\resources\views/administration/layoutAdmin/bodyFAQ.blade.php ENDPATH**/ ?>
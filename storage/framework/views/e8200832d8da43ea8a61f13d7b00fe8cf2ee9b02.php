<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('about')->html();
} elseif ($_instance->childHasBeenRendered('lvXPD2O')) {
    $componentId = $_instance->getRenderedChildComponentId('lvXPD2O');
    $componentTag = $_instance->getRenderedChildComponentTagName('lvXPD2O');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lvXPD2O');
} else {
    $response = \Livewire\Livewire::mount('about');
    $html = $response->html();
    $_instance->logRenderedChild('lvXPD2O', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php /**PATH C:\laragon\www\Osature\resources\views/administration/layoutAdmin/bodyAbout.blade.php ENDPATH**/ ?>
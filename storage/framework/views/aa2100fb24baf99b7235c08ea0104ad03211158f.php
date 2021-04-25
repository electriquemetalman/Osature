<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('new-investment')->html();
} elseif ($_instance->childHasBeenRendered('2eqzT8F')) {
    $componentId = $_instance->getRenderedChildComponentId('2eqzT8F');
    $componentTag = $_instance->getRenderedChildComponentTagName('2eqzT8F');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2eqzT8F');
} else {
    $response = \Livewire\Livewire::mount('new-investment');
    $html = $response->html();
    $_instance->logRenderedChild('2eqzT8F', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php /**PATH C:\laragon\www\Osature\resources\views/administration/layoutAdmin/bodyInvestment.blade.php ENDPATH**/ ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('changemdp',['ident'=>$ident])->html();
} elseif ($_instance->childHasBeenRendered('su9funG')) {
    $componentId = $_instance->getRenderedChildComponentId('su9funG');
    $componentTag = $_instance->getRenderedChildComponentTagName('su9funG');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('su9funG');
} else {
    $response = \Livewire\Livewire::mount('changemdp',['ident'=>$ident]);
    $html = $response->html();
    $_instance->logRenderedChild('su9funG', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\laragon\www\Osature\resources\views/sections/changepw.blade.php ENDPATH**/ ?>
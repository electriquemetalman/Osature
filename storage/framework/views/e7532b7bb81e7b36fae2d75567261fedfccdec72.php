<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('changemdp',['ident'=>$ident])->html();
} elseif ($_instance->childHasBeenRendered('fsiikQ1')) {
    $componentId = $_instance->getRenderedChildComponentId('fsiikQ1');
    $componentTag = $_instance->getRenderedChildComponentTagName('fsiikQ1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('fsiikQ1');
} else {
    $response = \Livewire\Livewire::mount('changemdp',['ident'=>$ident]);
    $html = $response->html();
    $_instance->logRenderedChild('fsiikQ1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\laragon\www\Osature\resources\views/sections/changepw.blade.php ENDPATH**/ ?>
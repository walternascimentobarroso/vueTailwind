<template>
  <div className="sidebar-icon group">
    <i>
      <slot name="icon"></slot>
    </i>
    <span class="sidebar-tooltip group-hover:scale-100">
     <slot name="heading"></slot>
    </span>
  </div>
</template>


<style>
i {
  display: flex;
  place-items: center;
  place-content: center;
  width: 32px;
  height: 32px;
  color: #fff;
  filter: invert(99%) sepia(96%) saturate(5%) hue-rotate(174deg) brightness(106%) contrast(100%);
}

</style>

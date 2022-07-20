<script setup lang="ts">
import SideBarIcon from './SideBarIcon.vue'
import DocumentationIcon from '../icons/IconDocumentation.vue'
import ToolingIcon from '../icons/IconTooling.vue'
import EcosystemIcon from '../icons/IconEcosystem.vue'
import CommunityIcon from '../icons/IconCommunity.vue'
import SupportIcon from '../icons/IconSupport.vue'
</script>

<template>

<div className="fixed top-0 left-0 h-screen w-16 flex flex-col
            bg-white dark:bg-gray-900 shadow-lg">

            <div class="test">
              <img alt="Vue logo" class="logo" src="../../assets/logo.png" width="25" height="25" />
            </div>

  <SideBarIcon>
      <template #icon>
        <img alt="Vue logo" class="logo" src="../../assets/Analitics.svg" width="25" height="25" />
    </template>
    <template #heading>
      Dashboard
    </template>
  </SideBarIcon>

<hr className="sidebar-hr" />

<SideBarIcon>
    <template #icon>
      <img alt="Vue logo" class="logo" src="../../assets/second.svg" width="25" height="25" />
    </template>
    <template #heading>
     Warehouse
    </template>
  </SideBarIcon>

<hr className="sidebar-hr" />

<SideBarIcon>
    <template #icon>
      <img alt="Vue logo" class="logo" src="../../assets/mail.svg" width="25" height="25" />
    </template>
    <template #heading>
     Email
    </template>
  </SideBarIcon>

  <hr className="sidebar-hr" />

<SideBarIcon>
    <template #icon>
      <img alt="Vue logo" class="logo" src="../../assets/card.svg" width="25" height="25" />
    </template>
    <template #heading>
     Users
    </template>
  </SideBarIcon>

  <hr className="sidebar-hr" />

<SideBarIcon>
    <template #icon>
      <img alt="Vue logo" class="logo" src="../../assets/doc.svg" width="25" height="25" />
    </template>
    <template #heading>
     Doc
    </template>
  </SideBarIcon>


  <hr className="sidebar-hr" />

<SideBarIcon>
    <template #icon>
      <img alt="Vue logo" class="logo" src="../../assets/Connection.svg" width="25" height="25" />
    </template>
    <template #heading>
     Connection
    </template>
  </SideBarIcon>

<hr className="sidebar-hr" />

<SideBarIcon>
    <template #icon>
      <img alt="Vue logo" class="logo" src="../../assets/third.svg" width="25" height="25" />
    </template>
    <template #heading>
     All Users
    </template>
  </SideBarIcon>

<hr className="sidebar-hr" />
</div>

</template>

<style scoped>
.test {
  display: flex;
  place-items: center;
  place-content: center;

  margin: 5px 0 50px 0;
}


</style>
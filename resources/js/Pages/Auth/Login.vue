<script setup>
import InputGroup from "primevue/inputgroup";
import InputGroupAddon from "primevue/inputgroupaddon";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
</script>
<template>
    <section class="container mx-auto h-screen flex items-center">
        <form
            class="h-screen md:h-auto w-screen md:max-w-screen-sm md:mx-auto space-y-12 p-12 md:rounded-lg md:shadow bg-zinc-800 md:border md:border-zinc-700"
        >
            <div class="text-center divide-y divide-zinc-700 space-y-2">
                <h1 class="text-6xl font-bold text-rose-400">MWM</h1>
                <p class="px-8 md:text-xl text-zinc-400">
                    Por favor, preencha abaixo com
                    <span class="font-bold">e-mail</span> e
                    <span class="font-bold">senha</span> para acessar a sua
                    conta.
                </p>
            </div>
            <div class="space-y-4">
                <InputGroup>
                    <InputGroupAddon><i class="pi pi-at"></i></InputGroupAddon>
                    <InputText placeholder="email@exemplo.com" />
                </InputGroup>
                <InputGroup>
                    <InputGroupAddon><i class="pi pi-key"></i></InputGroupAddon>
                    <InputText placeholder="********" />
                </InputGroup>
            </div>
            <Button type="submit" label="Entrar" class="w-full" />
        </form>
    </section>
</template>

<script setup>
import InputGroup from "primevue/inputgroup";
import InputGroupAddon from "primevue/inputgroupaddon";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import { useForm } from "@inertiajs/vue3";
import Password from "primevue/password";

const form = useForm({
    email: null,
    password: null,
});

function submit() {
    form.post("/login", {
        onSuccess: () => form.reset(),
    });
}
</script>
<template>
    <section class="container mx-auto h-screen flex items-center">
        <form
            @submit.prevent="submit"
            class="h-screen md:h-auto w-screen md:max-w-screen-sm md:mx-auto space-y-12 p-12 md:rounded-lg md:shadow bg-zinc-800 md:border md:border-zinc-700"
        >
            <div class="text-center divide-y divide-zinc-700 space-y-2">
                <h1 class="text-6xl font-bold text-rose-400">MWM</h1>
                <div class="md:text-xl">
                    <p v-if="!form.errors.login" class="px-8 text-zinc-400">
                        Por favor, preencha abaixo com
                        <span class="font-bold">e-mail</span> e
                        <span class="font-bold">senha</span> para acessar a sua
                        conta.
                    </p>
                    <p v-else class="text-red-300">
                        {{ form.errors.login }}
                    </p>
                </div>
            </div>
            <div class="space-y-4">
                <InputGroup>
                    <InputGroupAddon><i class="pi pi-at"></i></InputGroupAddon>
                    <InputText
                        v-model="form.email"
                        :invalid="form.errors.password"
                        placeholder="email@exemplo.com"
                    />
                </InputGroup>
                <span
                    v-if="form.errors.email"
                    class="text-sm md:text-base text-red-300"
                    >{{ form.errors.email }}</span
                >
                <InputGroup>
                    <InputGroupAddon><i class="pi pi-key"></i></InputGroupAddon>
                    <Password
                        v-model="form.password"
                        :invalid="form.errors.password"
                        toggleMask
                        placeholder="********"
                    />
                </InputGroup>
                <span
                    v-if="form.errors.password"
                    class="text-sm md:text-base text-red-300"
                >
                    {{ form.errors.password }}
                </span>
            </div>
            <Button
                type="submit"
                label="Entrar"
                class="w-full"
                :disabled="form.processing"
            />
        </form>
    </section>
</template>

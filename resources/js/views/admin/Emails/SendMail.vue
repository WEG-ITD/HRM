<template>
    <form @submit.prevent="sendMail">
        <label>
            Branch:
            <select v-model="branch">
                <option value="branch1">Branch 1</option>
                <option value="branch2">Branch 2</option>
            </select>
        </label>
        <br>
        <label>
            Role:
            <select v-model="role">
                <option value="role1">Role 1</option>
                <option value="role2">Role 2</option>
            </select>
        </label>
        <br>
        <label>
            To:
            <input type="email" v-model="to">
        </label>
        <br>
        <label>
            Subject:
            <input type="text" v-model="subject">
        </label>
        <br>
        <label>
            Content:
            <textarea v-model="content"></textarea>
        </label>
        <br>
        <button type="submit">Send Mail</button>
    </form>
</template>
<script>
export default {
    data() {
        return {
            branch: '',
            role: '',
            to: '',
            subject: '',
            content: ''
        }
    },
    methods: {
        sendMail() {
            axios.post('/sendmail', {
                branch: this.branch,
                role: this.role,
                to: this.to,
                subject: this.subject,
                content: this.content
            }).then(response => {
                console.log(response.data);
            }).catch(error => {
                console.log(error.response.data);
            });
        }
    }
}
</script>

<template>
  <div class="message">
    <Panel title="回复留言">
      <div class="info_item">
        <h3>昵称：</h3>
        <p>{{formData.nick_name}}</p>
      </div>
      <div class="info_item">
        <h3>邮箱：</h3>
        <p>{{formData.mail}}</p>
      </div>
      <div class="info_item">
        <h3>内容：</h3>
        <p style="margin-top: 10px">{{formData.content}}</p>
      </div>
      <Form :rules="rules" label-position="top" >
        <Form-item :error="errors.reply">
          <h3>管理员回复：</h3>
          <Input v-model="formData.reply" :rows="4" type="textarea" placeholder="请输入回复内容"></Input>
        </Form-item>
        <FormButtomGroup />
      </Form>
    </Panel>
  </div>
</template>

<script>
import Panel from '../../components/Panel.vue';
import fromMixin from '../../mixins/form';
import FormButtomGroup from '../../components/FormButtonGroup.vue';
export default {
  components: { Panel, FormButtomGroup },
  mixins: [ fromMixin ],
  computed: {
    rules () {
      return {
        reply: [
          { required: true, type: 'string', max: 500, message: '请输入回复内容', trigger: 'blur' }
        ]
      };
    },
    mixinConfig () {
      return {
        title: '留言',
        action: `messages/${this.$route.params.id}`,
      };
    },
  },
  mounted () {
    this.$on('on-success', () => {
      this.$router.push({name: 'messageList', params: {status: 'status'}});
    });
  },
  data () {
    return {
      formData: {
        'email': null,
        'nick_name': null,
        'content': null,
        'reply': null,
      }
    };
  }
};
</script>

<style lang="less" scoped>
.message{
  .info_item{
    margin-bottom: 10px;
    h3, p{
      display: inline-block;
    }
    p{
      letter-spacing: 1px;
    }
  }
}
</style>


<template>
  <div class="message_list">
    <ListWrapper ref="list" title="留言列表" :queryName="mixinConfig.action + '?' + status">
      <div slot="option_left">
        <RadioGroup v-model="status" type="button">
          <Radio label="no_reply">待回复</Radio>
          <Radio label="has_been_reply">已回复</Radio>
        </RadioGroup>
      </div>
      <template slot-scope="props">
        <TTable :columns="columns" :data="props.data" />
      </template>
    </ListWrapper>
  </div>
</template>

<script>
import HoverableTime from '../../components/HoverableTime.vue';
import TTable from '../../components/t-table';
import ListWrapper from '../../components/ListWrapper.vue';
import delMixin from '../../mixins/del';
import { strLimit } from '../../utils/utils';
export default {
  components: { HoverableTime, TTable, ListWrapper },
  computed: {
    mixinConfig () {
      return {
        title: '留言',
        action: `messages`
      };
    }
  },
  mixins: [ delMixin ],
  watch: {
    status () {
      this.$router.push({name: this.$route.name, params: {status: this.status}});
    }
  },
  mounted () {
    let status = this.$route.params.status;
    if (status) {
      this.status = status;
    }
  },
  data () {
    return {
      status: 'no_reply',
      columns: [
        {
          title: '昵称',
          key: 'nick_name',
          width: '160px',
        },
        {
          title: 'email',
          key: 'mail',
          width: '160px',
        },
        {
          title: '留言内容',
          key: 'content',
          render: (h, params) => {
            return h('span', {
              attrs: {
                title: params.content
              }
            }, strLimit(params.content, 10));
          }
        },
        {
          title: '留言日期',
          key: 'created_at',
          render: (h, params) => {
            return h(HoverableTime, {
              props: {time: params.created_at}
            });
          },
          width: '100px'
        },
        {
          title: '回复',
          key: 'reply',
          render: (h, params) => {
            if (!params.reply) {
              return h('i', {}, '暂未回复');
            }
            return h('span', {
              attrs: {
                title: params.reply
              }
            }, strLimit(params.reply, 10));
          }
        },
        {
          title: '操作',
          key: 'action',
          render: (h, params) => {
            return h('div', [
              h('Button', {
                props: {
                  type: 'primary',
                  size: 'small'
                },
                style: {
                  marginRight: '5px'
                },
                on: {
                  click: () => {
                    this.$router.push({name: 'message', params: {id: params.id}});
                  }
                }
              }, this.status === 'has_been_reply' ? '修改回复' : '回复'),
              h('Button', {
                props: {
                  type: 'error',
                  size: 'small'
                },
                on: {
                  click: () => { this.del(params.id); }
                },
              }, '删除')
            ]);
          }
        }
      ]
    };
  }
};
</script>

<style lang="less" scoped>

</style>



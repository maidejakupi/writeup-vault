@props(['flag'])

<span x-data="{
        revealed: false,
        copied: false,
        flag: @js($flag),
        copy() {
            const done = () => { this.copied = true; setTimeout(() => this.copied = false, 1500); };
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(this.flag).then(done);
            } else {
                const t = document.createElement('textarea');
                t.value = this.flag;
                document.body.appendChild(t);
                t.select();
                document.execCommand('copy');
                t.remove();
                done();
            }
        }
    }"
      class="inline-flex items-center gap-2 align-middle">

    <button type="button" @click="revealed = !revealed" title="Click to reveal the flag"
            class="px-2 py-1 border border-yellow-500 text-yellow-300 bg-yellow-950/40 rounded transition">
        <span :class="revealed ? '' : 'blur-sm select-none'" class="transition">{{ $flag }}</span>
    </button>

    <button type="button" x-show="revealed" x-cloak @click="copy()"
            class="text-xs border border-green-500 rounded px-2 py-1 hover:bg-green-500 hover:text-gray-950 transition"
            x-text="copied ? 'copied!' : 'copy'"></button>
</span>

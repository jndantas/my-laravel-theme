const EntryObserver = {
    created(){
        Fire.$on('AfterCreateEntry', this.loadData);
        Fire.$on('AfterUpdateEntry', this.loadData);
    },
    destroyed() {
        Fire.$off('AfterCreateEntry');
        Fire.$off('AfterUpdateEntry');
    }
}

export default EntryObserver

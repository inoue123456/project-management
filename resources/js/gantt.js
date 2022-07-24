var tasks = [];
for (let i = 0; i < Laravel.personalTasks.length; i++) {
    tasks.unshift({
        id: 'id1',
        name: Laravel.personalTasks[i].personaltask_name,
        description: '必ずやる!!',
        start: Laravel.personalTasks[i].created_at,
        end: Laravel.personalTasks[i].deadline_date,
        progress: Laravel.personalTasks[i].progress,
    });
}
// gantt をセットアップ
var gantt = new Gantt("#gantt", tasks, {
    // ダブルクリック時
    on_click: (task) => {
        window.alert(task.description);
    },
    // 日付変更時
    on_date_change: (task, start, end) => {
        console.log(`${task.name}: change date`);
    },
    // 進捗変更時
    on_progress_change: (task, progress) => {
        console.log(`${task.name}: change progress to ${progress}%`);
    },
});

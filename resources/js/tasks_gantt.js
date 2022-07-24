var tasks = [];
for (let i = 0; i < Laravel.tasks.length; i++) {
    tasks.unshift({
        id: 'id1',
        name: Laravel.tasks[i].task_name,
        description: '必ずやる!!',
        start: Laravel.tasks[i].created_at,
        end: Laravel.tasks[i].deadline_date,
        progress: Laravel.tasks[i].progress,
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

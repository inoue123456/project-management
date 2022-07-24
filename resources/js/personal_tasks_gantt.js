var personalTasks = [];
for (let i = 0; i < Laravel.personalTasks.length; i++) {
    personalTasks.unshift({
        id: 'id1',
        name: Laravel.personalTasks[i].personaltask_name,
        description: '必ずやる!!',
        start: Laravel.personalTasks[i].created_at,
        end: Laravel.personalTasks[i].deadline_date,
        progress: Laravel.personalTasks[i].progress,
    });
}
// gantt をセットアップ
var gantt = new Gantt("#gantt", personalTasks, {
    // ダブルクリック時
    on_click: (personalTask) => {
        window.alert(personalTask.description);
    },
    // 日付変更時
    on_date_change: (personalTask, start, end) => {
        console.log(`${personalTask.name}: change date`);
    },
    // 進捗変更時
    on_progress_change: (personalTask, progress) => {
        console.log(`${personalTask.name}: change progress to ${progress}%`);
    },
});

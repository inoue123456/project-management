var tasks = [
    {
        id: 'id1',
        name: '確定申告する',
        description: '必ずやる!!',
        start: '2021-01-01',
        end: '2021-01-7',
        progress: 100,
    },
    {
        id: 'id2',
        name: 'クライアントに挨拶',
        description: '年賀状も確認した上で連絡する',
        start: '2021-01-4',
        end: '2021-01-8',
        progress: 100,
    },
    {
        id: 'id3',
        name: '請求書作成',
        description: 'みんなに稼働時間を記録してもらった上で請求を出す',
        start: '2021-01-5',
        end: '2021-01-6',
        progress: 80,
    }
];
console.log(Laravel.personalTasks);
// gantt をセットアップ
/*ganttにLaravel.personalTasksを渡したとき
name→personaltask_name, start→created_atの日付か開始日カラムを付け足すか, end→deadline_dateのデータを引っ張ってきたい
けどどうするかわからない
//*/
var gantt = new Gantt("#gantt", tasks, {
    // ダブルクリック時
    on_click: (task) => {
        console.log(task.description);
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
